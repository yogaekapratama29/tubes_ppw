@extends('layouts.app')

@section('content')
<div class="content">
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <div class="p-4 border-bottom">
            <a href="{{ route('aduan.index') }}" class="btn btn-link text-decoration-none text-dark p-0 mb-3 d-inline-flex align-items-center">
                <i class="bi bi-arrow-left fs-5 me-2"></i>
                <span class="fw-semibold">Kembali</span>
            </a>
            
            <h4 class="fw-bold text-center mb-0 mt-3">Keterangan Aduan Warga</h4>
        </div>
        <div class="p-4">
            <div class="card border-0 bg-light rounded-3 p-4">

                <div class="mb-4">
                    <label class="text-muted small fw-semibold mb-1">Nama :</label>
                    <p class="mb-0 fw-medium">Abdul Munir</p>
                </div>
                <div class="mb-4">
                    <label class="text-muted small fw-semibold mb-1">NIK :</label>
                    <p class="mb-0 fw-medium">33101402106040002</p>
                </div>
                <div class="mb-4">
                    <label class="text-muted small fw-semibold mb-1">Jenis Aduan :</label>
                    <p class="mb-0 fw-medium">Kebersihan Desa</p>
                </div>
                <div class="mb-0">
                    <label class="text-muted small fw-semibold mb-2">Unggahan File :</label>
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="text-primary text-decoration-none d-flex align-items-center">
                            <i class="bi bi-file-earmark-image me-2"></i>
                            <span class="text-truncate" style="max-width: 400px;">
                                https://jsdjvnkenvoluarnvoern vobe rv31034B4df04gh358394h214.jpg
                            </span>
                        </a>
                        <a href="#" class="text-primary text-decoration-none d-flex align-items-center">
                            <i class="bi bi-file-earmark-image me-2"></i>
                            <span class="text-truncate" style="max-width: 400px;">
                                https://jsdjvnkenvoluarnvoern vobe rv31034B4df04gh358394h214.jpg
                            </span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-end gap-2 mt-4">
                <button class="btn btn-danger px-4 py-2">
                    <i class="bi bi-x-circle me-1"></i> Tolak
                </button>
                <button class="btn btn-success px-4 py-2">
                    <i class="bi bi-check-circle me-1"></i> Setujui
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .content {
        padding: 1.5rem;
    }
    
    .btn-link:hover {
        opacity: 0.7;
    }
    
    .card.bg-light {
        background-color: #f8f9fa !important;
    }
    
    .text-truncate {
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endsection