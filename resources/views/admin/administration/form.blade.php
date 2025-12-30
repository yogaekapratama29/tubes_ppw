@extends('layouts.app')

@section('title', isset($administration_request) ? 'Edit Administrasi' : 'Tambah Administrasi Baru')

@section('content')
<x-container>
    <h4 class="fw-bold mb-4">{{ isset($administration_request) ? 'Edit Administrasi' : 'Tambah Administrasi Baru' }}</h4>

    <form action="{{ isset($administration_request) ? route('administration.update', $administration_request->id) : route('administration.store') }}" method="POST">
        @csrf
        @if(isset($administration_request))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="letter_type" class="form-label">Jenis Surat</label>
            <select class="form-select @error('letter_type') is-invalid @enderror" id="letter_type" name="letter_type">
                <option value="ktp" @selected(old('letter_type', $administration_request->letter_type ?? '') == 'ktp')>KTP</option>
                <option value="kk" @selected(old('letter_type', $administration_request->letter_type ?? '') == 'kk')>Kartu Keluarga</option>
                <option value="sk" @selected(old('letter_type', $administration_request->letter_type ?? '') == 'sk')>Surat Keterangan</option>
            </select>
            @error('letter_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Pesan/Catatan</label>
            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3" @if(isset($administration_request)) readonly @endif>{{ old('message', $administration_request->message ?? '') }}</textarea>
            @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK Pemohon</label>
            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $administration_request->user->national_id ?? '') }}" @if(isset($administration_request)) disabled @endif>
            @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if(isset($administration_request))
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="pending" @selected(old('status', $administration_request->status) == 'pending')>Pending</option>
                    <option value="approved" @selected(old('status', $administration_request->status) == 'approved')>Approved</option>
                    <option value="rejected" @selected(old('status', $administration_request->status) == 'rejected')>Rejected</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="response" class="form-label">Balasan</label>
                <textarea class="form-control @error('response') is-invalid @enderror" id="response" name="response" rows="3">{{ old('response', $administration_request->response ?? '') }}</textarea>
                @error('response')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endif

        <button type="submit" class="btn btn-primary">{{ isset($administration_request) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('administration.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</x-container>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSelect = document.getElementById('status');
            const responseTextarea = document.getElementById('response');

            if (statusSelect) {
                const toggleResponse = () => {
                    responseTextarea.disabled = statusSelect.value === 'pending';
                };

                toggleResponse();
                statusSelect.addEventListener('change', toggleResponse);
            }
        });
    </script>
@endpush
