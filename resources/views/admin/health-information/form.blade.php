@extends('layouts.app')

@section('title', isset($health_information) ? 'Edit Informasi Kesehatan' : 'Tambah Informasi Kesehatan Baru')

@section('content')
<div class="p-2 p-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold mb-0">{{ isset($health_information) ? 'Edit Informasi Kesehatan' : 'Tambah Informasi Kesehatan Baru' }}</h4>
        </div>
        <div class="card-body p-3 p-md-4">
            <form action="{{ isset($health_information) ? route('health-information.update', $health_information->id) : route('health-information.store') }}" method="POST">
                @csrf
                @if(isset($health_information))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Informasi Kesehatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $health_information->title ?? '') }}" required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="event_date" class="form-label">Tanggal Acara <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date', $health_information->event_date ?? '') }}" required>
                        @error('event_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $health_information->location ?? '') }}" required>
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $health_information->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <small class="text-muted">Jelaskan secara detail tentang kegiatan kesehatan ini</small>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input @error('is_draft') is-invalid @enderror" type="checkbox" id="is_draft" name="is_draft" value="1" @checked(old('is_draft', $health_information->is_draft ?? true))>
                        <label class="form-check-label" for="is_draft">
                            Simpan sebagai draft
                        </label>
                        @error('is_draft')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <small class="text-muted">Draft tidak akan ditampilkan ke publik</small>
                </div>

                <input type="hidden" name="author_id" value="{{ auth()->id() }}">

                <div class="d-flex gap-2 flex-column flex-sm-row">
                    <button type="submit" class="btn btn-primary">{{ isset($health_information) ? 'Update' : 'Simpan' }}</button>
                    <a href="{{ route('health-information.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
