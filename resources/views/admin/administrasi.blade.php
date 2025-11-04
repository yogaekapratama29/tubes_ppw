@extends('layouts.app')

@section('content')
<div class="content">
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
            <h4 class="fw-bold mb-0">Administrasi</h4>
            <button class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Baru
            </button>
        </div>
        <div class="p-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0">Kartu Tanda Penduduk</h6>
                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Abdul Munir</span>
                                <small class="d-block text-muted">Pengajuan: 01 Nov 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2">Diproses</span>
                    </a>

                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Triadi Analdi</span>
                                <small class="d-block text-muted">Pengajuan: 28 Okt 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-primary px-3 py-2">Selesai</span>
                    </a>

                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Vini Andini</span>
                                <small class="d-block text-muted">Pengajuan: 25 Okt 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-danger px-3 py-2">Ditolak</span>
                    </a>
                </div>
            </div>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0">Kartu Keluarga</h6>
                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people-fill fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Keluarga Budi Santoso</span>
                                <small class="d-block text-muted">Pengajuan: 02 Nov 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2">Diproses</span>
                    </a>

                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people-fill fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Keluarga Ahmad Dahlan</span>
                                <small class="d-block text-muted">Pengajuan: 30 Okt 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-primary px-3 py-2">Selesai</span>
                    </a>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0">Surat Keterangan</h6>
                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-file-earmark-text fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Siti Nurhaliza - SKCK</span>
                                <small class="d-block text-muted">Pengajuan: 03 Nov 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2">Diproses</span>
                    </a>

                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-file-earmark-text fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Andi Prasetyo - Surat Domisili</span>
                                <small class="d-block text-muted">Pengajuan: 01 Nov 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-primary px-3 py-2">Selesai</span>
                    </a>

                    <a href="{{ route('administrasi.detail') }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-file-earmark-text fs-4 text-muted me-3"></i>
                            <div>
                                <span class="fw-semibold">Dewi Lestari - Surat Usaha</span>
                                <small class="d-block text-muted">Pengajuan: 29 Okt 2025</small>
                            </div>
                        </div>
                        <span class="badge bg-danger px-3 py-2">Ditolak</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .content {
        padding: 1.5rem;
    }
    
    .list-group-item {
        border-left: none;
        border-right: none;
        transition: all 0.2s ease;
    }
    
    .list-group-item:first-child {
        border-top: none;
    }
    
    .list-group-item:hover {
        background-color: #f8f9fa;
        padding-left: 1.5rem;
    }
    
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 6px;
        min-width: 80px;
        text-align: center;
    }
    
    .hover-bg-light:hover {
        background-color: #f8f9fa !important;
    }
</style>
@endsection