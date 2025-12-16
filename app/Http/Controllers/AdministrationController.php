<?php

namespace App\Http\Controllers;

use App\Models\AdministrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
