@extends('layouts.app')

@section('title', isset($user) ? 'Edit' : 'Buat' . ' Akun Warga')

@section('content')
<x-container>
    <h4 class="fw-bold mb-4">{{ isset($user) ? 'Edit' : 'Buat' . ' Akun Warga' }}</h4>

    <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name ?? '') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email ?? '') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @if(isset($user))
                <div class="form-text">Kosongkan jika tidak ingin mengubah password.</div>
            @endif
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            @if(isset($user))
                <div class="form-text">Kosongkan jika tidak ingin mengubah password.</div>
            @endif
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                <option value="anggota" @selected(old('role', $user->role ?? '') == 'anggota')>Anggota</option>
                <option value="admin" @selected(old('role', $user->role ?? '') == 'admin')>Admin</option>
                <option value="super admin" @selected(old('role', $user->role ?? '') == 'super admin')>Super Admin</option>
                <option value="keuangan" @selected(old('role', $user->role ?? '') == 'keuangan')>Keuangan</option>
            </select>
            @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="phone" class="form-label">No. Telepon</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="national_id" class="form-label">NIK</label>
            <input type="number" class="form-control @error('national_id') is-invalid @enderror" id="national_id" name="national_id" value="{{ old('national_id', $user->national_id ?? '') }}">
            @error('national_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @if(isset($user) && $user->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $user->image_path) }}" alt="foto profil" width="100">
                </div>
            @endif
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</x-container>
@endsection

