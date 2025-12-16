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
            'response' => $validated['response'],
        ];

        if ($validated['status'] !== 'pending' && is_null($administration_request->admin_id)) {
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
        //
    }
}
