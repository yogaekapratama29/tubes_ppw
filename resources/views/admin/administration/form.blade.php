@extends('layouts.app')

@section('title', 'Tambah Administrasi Baru')

@section('content')
<div class="container mt-4">
    <div class="bg-white rounded-4 shadow-sm p-4">
        <h4 class="fw-bold mb-4">Tambah Administrasi Baru</h4>

        <form action="{{ route('administration.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="letter_type" class="form-label">Jenis Surat</label>
                <select class="form-select @error('letter_type') is-invalid @enderror" id="letter_type" name="letter_type">
                    <option value="ktp" @selected(old('letter_type') == 'ktp')>KTP</option>
                    <option value="kk" @selected(old('letter_type') == 'kk')>Kartu Keluarga</option>
                    <option value="sk" @selected(old('letter_type') == 'sk')>Surat Keterangan</option>
                </select>
                @error('letter_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan/Catatan</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3">{{ old('message') }}</textarea>
                @error('message')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK Pemohon</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
</div>
@endsection
