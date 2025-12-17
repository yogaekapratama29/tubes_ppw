@extends('layouts.app')

@section('title', isset($village_potential) ? 'Edit Potensi Desa' : 'Tambah Potensi Desa Baru')

@section('content')
<div class="p-2 p-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold mb-0">{{ isset($village_potential) ? 'Edit Potensi Desa' : 'Tambah Potensi Desa Baru' }}</h4>
        </div>
        <div class="card-body p-3 p-md-4">
            <form action="{{ isset($village_potential) ? route('village-potential.update', $village_potential->id) : route('village-potential.store') }}" method="POST">
                @csrf
                @if(isset($village_potential))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Potensi Desa <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $village_potential->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $village_potential->address ?? '') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $village_potential->email ?? '') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $village_potential->phone ?? '') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $village_potential->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <small class="text-muted">Jelaskan secara detail tentang potensi desa ini</small>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input @error('is_draft') is-invalid @enderror" type="checkbox" id="is_draft" name="is_draft" value="1" @checked(old('is_draft', $village_potential->is_draft ?? true))>
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
                    <button type="submit" class="btn btn-primary">{{ isset($village_potential) ? 'Update' : 'Simpan' }}</button>
                    <a href="{{ route('village-potential.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
