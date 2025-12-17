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
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'message' => $validated['message'],
            'attachment_paths' => json_encode($attachmentPaths),
            'status' => 'pending',
        ]);

        return redirect()->route('citizen-report.index')->with('success', 'Aduan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CitizenReport $citizen_report)
    {
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
            'status' => ['required', 'in:pending,resolved,rejected'],
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
}
