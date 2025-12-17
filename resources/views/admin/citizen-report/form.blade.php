@extends('layouts.app')

@section('title', isset($citizen_report) ? 'Edit Aduan Warga' : 'Buat Aduan Warga')

@section('content')
<x-container>
    <h4 class="fw-bold mb-4">{{ isset($citizen_report) ? 'Edit Aduan Warga' : 'Buat Aduan Warga' }}</h4>

    <form action="{{ isset($citizen_report) ? route('citizen-report.update', $citizen_report->id) : route('citizen-report.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($citizen_report))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="message" class="form-label">Pesan/Aduan</label>
            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3">{{ old('message', $citizen_report->message ?? '') }}</textarea>
            @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="attachments" class="form-label">Lampiran</label>
            <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple>
            @if(isset($citizen_report) && $citizen_report->attachment_paths)
                <div class="mt-2">
                    <p>Lampiran saat ini:</p>
                    @foreach(json_decode($citizen_report->attachment_paths) as $attachment)
                        <a href="{{ asset('storage/' . $attachment) }}" target="_blank">Lihat Lampiran</a>
                    @endforeach
                </div>
            @endif
            @error('attachments')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @error('attachments.*')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK Pelapor</label>
            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $citizen_report->user->national_id ?? '') }}" @if(isset($citizen_report)) disabled @endif>
            @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if(isset($citizen_report))
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="pending" @selected(old('status', $citizen_report->status) == 'pending')>Pending</option>
                    <option value="resolved" @selected(old('status', $citizen_report->status) == 'resolved')>Resolved</option>
                    <option value="rejected" @selected(old('status', $citizen_report->status) == 'rejected')>Rejected</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="response" class="form-label">Balasan</label>
                <textarea class="form-control @error('response') is-invalid @enderror" id="response" name="response" rows="3">{{ old('response', $citizen_report->response ?? '') }}</textarea>
                @error('response')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endif

        <button type="submit" class="btn btn-primary">{{ isset($citizen_report) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('citizen-report.index') }}" class="btn btn-secondary">Batal</a>
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

