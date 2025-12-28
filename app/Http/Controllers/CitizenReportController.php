<?php

namespace App\Http\Controllers;

use App\Models\CitizenReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CitizenReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citizen_reports = CitizenReport::with(['user', 'admin'])->latest()->get();

        return view('admin.citizen-report.index', compact('citizen_reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.citizen-report.form');
    }

    /**
     * Store a newly created resource in storage.
     * @OA\Post(
     *     path="/api/citizen-report",
     *     operationId="storeCitizenReport",
     *     tags={"Citizen Report"},
     *     summary="Create a new citizen report",
     *     description="Store a newly created citizen report with optional attachments",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Citizen report data",
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="nik", type="string", description="User's national ID"),
     *                 @OA\Property(property="message", type="string", description="Report message"),
     *                 @OA\Property(property="attachments", type="array", @OA\Items(type="string", format="binary"), description="Optional file attachments")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Report created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Aduan berhasil dibuat!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'no_hp' => ['required', 'string'],
            'message' => ['required', 'string'],
            'attachments.*' => ['nullable', 'file', 'max:2048'],
            'nik' => ['required', 'string', 'exists:users,national_id'],
        ]);

        $user = User::where('national_id', $validated['nik'])->first();

        $attachmentPaths = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $attachmentPaths[] = $file->store('citizen-reports', 'public');
            }
        }

        CitizenReport::create([
            'user_id' => $user->id,
            'nama' => $validated['nama'],
            'no_hp' => $validated['no_hp'],
            'message' => $validated['message'],
            'attachment_paths' => json_encode($attachmentPaths),
            'status' => 'pending',
        ]);

        if ($request->wantsJson() || $request->is('api/*')) {
        return response()->json([
            'success' => true,
            'message' => 'Aduan berhasil dikirim.'
        ], 201);
    }

    
        return redirect()->route('citizen-report.index')
                     ->with('success', 'Aduan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     * @OA\Get(
     *     path="/api/citizen-report/{id}",
     *     operationId="showCitizenReport",
     *     tags={"Citizen Report"},
     *     summary="Get citizen report details",
     *     description="Retrieve details of a specific citizen report",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Citizen report ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Citizen report retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="citizen_report", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="user_id", type="integer"),
     *                 @OA\Property(property="admin_id", type="integer", nullable=true),
     *                 @OA\Property(property="message", type="string"),
     *                 @OA\Property(property="status", type="string", enum={"pending", "approved", "rejected"}),
     *                 @OA\Property(property="response", type="string", nullable=true),
     *                 @OA\Property(property="attachment_paths", type="string"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Citizen report not found"
     *     )
     * )
     */
    public function show(Request $request, CitizenReport $citizen_report)
    {
        if ($request->wantsJson()) {
            return response()->json(compact('citizen_report'));
        }

        return view('admin.citizen-report.show', compact('citizen_report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CitizenReport $citizen_report)
    {
        return view('admin.citizen-report.form', compact('citizen_report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CitizenReport $citizen_report)
    {
        $validated = $request->validate([
            'message' => ['required', 'string'],
            'attachments.*' => ['nullable', 'file', 'max:2048'],
            'status' => ['required', 'in:pending,approved,rejected'],
            'response' => [Rule::requiredIf(fn () => $request->status !== 'pending'), 'nullable', 'string'],
        ]);

        $attachmentPaths = json_decode($citizen_report->attachment_paths, true) ?? [];
        if ($request->hasFile('attachments')) {
            foreach ($attachmentPaths as $path) {
                Storage::disk('public')->delete($path);
            }

            $newAttachmentPaths = [];
            foreach ($request->file('attachments') as $file) {
                $newAttachmentPaths[] = $file->store('citizen-reports', 'public');
            }
            $attachmentPaths = $newAttachmentPaths;
        }

        $updateData = [
            'message' => $validated['message'],
            'attachment_paths' => json_encode($attachmentPaths),
            'status' => $validated['status'],
        ];

        if ($validated['status'] === 'pending') {
            $updateData['response'] = null;
            $updateData['admin_id'] = null;
        } else {
            $updateData['response'] = $validated['response'];
            $updateData['admin_id'] = Auth::id();
        }

        $citizen_report->update($updateData);

        return redirect()->route('citizen-report.index')->with('success', 'Aduan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CitizenReport $citizen_report)
    {
        if ($citizen_report->attachment_paths) {
            foreach (json_decode($citizen_report->attachment_paths) as $path) {
                Storage::disk('public')->delete($path);
            }
        }
        $citizen_report->delete();

        return redirect()->route('citizen-report.index')->with('success', 'Aduan berhasil dihapus.');
    }

    /**
     * Get citizen reports by user
     * @OA\Get(
     *     path="/api/citizen-report/user/{id}",
     *     operationId="getCitizenReportByUser",
     *     tags={"Citizen Report"},
     *     summary="Get citizen reports by user",
     *     description="Retrieve all citizen reports for a specific user, grouped by status (pending and completed)",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User reports retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="pending", type="array", description="Pending reports",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer"),
     *                     @OA\Property(property="user_id", type="integer"),
     *                     @OA\Property(property="admin_id", type="integer", nullable=true),
     *                     @OA\Property(property="message", type="string"),
     *                     @OA\Property(property="status", type="string", example="pending"),
     *                     @OA\Property(property="response", type="string", nullable=true),
     *                     @OA\Property(property="attachment_paths", type="string"),
     *                     @OA\Property(property="created_at", type="string", format="date-time"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time")
     *                 )
     *             ),
     *             @OA\Property(property="completed", type="array", description="Completed reports (approved or rejected)",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer"),
     *                     @OA\Property(property="user_id", type="integer"),
     *                     @OA\Property(property="admin_id", type="integer"),
     *                     @OA\Property(property="message", type="string"),
     *                     @OA\Property(property="status", type="string", enum={"approved", "rejected"}),
     *                     @OA\Property(property="response", type="string"),
     *                     @OA\Property(property="attachment_paths", type="string"),
     *                     @OA\Property(property="created_at", type="string", format="date-time"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function getByUser(string $id)
    {
        $pending = CitizenReport::where('user_id', $id)
            ->where('status', 'pending')
            ->with(['user', 'admin'])
            ->latest()
            ->get();

        $completed = CitizenReport::where('user_id', $id)
            ->whereIn('status', ['approved', 'rejected'])
            ->with(['user', 'admin'])
            ->latest()
            ->get();

        return response()->json(compact('pending', 'completed'));
    }
}
