<?php

namespace App\Http\Controllers;

use App\Models\AdministrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administration_requests = AdministrationRequest::with(['user', 'admin'])->latest()->get();

        return view('admin.administration.index', compact('administration_requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.administration.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/administration",
     *     summary="Store a new administration request",
     *     tags={"Administration"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"letter_type", "message", "nik"},
     *             @OA\Property(property="letter_type", type="string", enum={"ktp", "kk", "sk"}, example="ktp"),
     *             @OA\Property(property="message", type="string", example="Permohonan pembuatan KTP baru."),
     *             @OA\Property(property="nik", type="string", example="3201234567890001")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Administration request created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Permintaan administrasi berhasil ditambahkan!")
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
            'letter_type' => ['required', 'string', Rule::in(['ktp', 'kk', 'sk'])],
            'message' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string'],
        ]);

        $user = User::where('national_id', $validated['nik'])->firstOrFail();

        AdministrationRequest::create([
            'user_id' => $user->id,
            'letter_type' => $validated['letter_type'],
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Permintaan administrasi berhasil ditambahkan!'
            ]);
        }

        return redirect()->route('administration.index')->with('success', 'Permintaan administrasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $administration_request = AdministrationRequest::with(['user', 'admin'])->find($id);

        return view('admin.administration.form', compact('administration_request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $administration_request = AdministrationRequest::findOrFail($id);

        $validated = $request->validate([
            'letter_type' => ['required', 'string', Rule::in(['ktp', 'kk', 'sk'])],
            'message' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', Rule::in(['pending', 'approved', 'rejected'])],
            'response' => ['nullable', 'string', 'max:255', Rule::requiredIf(function () use ($request) {
                return $request->input('status') !== 'pending';
            })],
        ]);

        $dataToUpdate = [
            'letter_type' => $validated['letter_type'],
            'message' => $validated['message'],
            'status' => $validated['status'],
        ];

        if ($validated['status'] === 'pending') {
            $dataToUpdate['response'] = null;
            $dataToUpdate['admin_id'] = null;
        } else {
            $dataToUpdate['response'] = $validated['response'];
            $dataToUpdate['admin_id'] = Auth::id();
        }

        $administration_request->update($dataToUpdate);

        return redirect()->route('administration.index')->with('success', 'Permintaan administrasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $administration_request = AdministrationRequest::findOrFail($id);
        $administration_request->delete();

        return redirect()->route('administration.index')->with('success', 'Permintaan administrasi berhasil dihapus.');
    }

    /**
     * @OA\Get(
     *     path="/api/administration/user/{id}",
     *     summary="Get administration requests by user ID",
     *     tags={"Administration"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="pending", type="array", @OA\Items(ref="#/components/schemas/AdministrationRequest")),
     *             @OA\Property(property="completed", type="array", @OA\Items(ref="#/components/schemas/AdministrationRequest"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function getByUser(string $id)
    {
        $pending = AdministrationRequest::where('user_id', $id)
            ->where('status', 'pending')
            ->with(['user', 'admin'])
            ->latest()
            ->get();

        $completed = AdministrationRequest::where('user_id', $id)
            ->whereIn('status', ['approved', 'rejected'])
            ->with(['user', 'admin'])
            ->latest()
            ->get();

        return response()->json(compact('pending', 'completed'));
    }
}
