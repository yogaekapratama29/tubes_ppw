@extends('layouts.app')

@section('content')
<div class="content">
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <div class="p-4 border-bottom">
            <h4 class="fw-bold mb-3">Aduan Warga</h4>
            <div class="d-flex gap-2">
                <button class="btn btn-dark btn-sm px-3">diproses</button>
                <button class="btn btn-outline-dark btn-sm px-3">selesai</button>
            </div>
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('aduan.detail') }}" 
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <span class="fw-semibold">Abdul Munir</span>
                        <small class="d-block text-muted">Kebersihan Desa</small>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm px-4">Cek</button>
            </a>

            <a href="{{ route('aduan.detail') }}" 
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <span class="fw-semibold">Ahmad Mubarak</span>
                        <small class="d-block text-muted">Infrastruktur Jalan</small>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm px-4">Cek</button>
            </a>

            <a href="{{ route('aduan.detail') }}" 
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <span class="fw-semibold">Syaif'i Anwar Batir</span>
                        <small class="d-block text-muted">Penerangan Jalan</small>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm px-4">Cek</button>
            </a>

            <a href="{{ route('aduan.detail') }}" 
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <span class="fw-semibold">Enzo Martha</span>
                        <small class="d-block text-muted">Drainase</small>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm px-4">Cek</button>
            </a>

            <a href="{{ route('aduan.detail') }}" 
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <span class="fw-semibold">Emmanuel Salim</span>
                        <small class="d-block text-muted">Kebersihan Desa</small>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm px-4">Cek</button>
            </a>
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
        transform: translateX(5px);
    }
    
    .btn-dark {
        background-color: #2c5f65;
        border-color: #2c5f65;
    }
    
    .btn-outline-dark {
        color: #2c5f65;
        border-color: #2c5f65;
    }
    
    .btn-outline-dark:hover {
        background-color: #2c5f65;
        border-color: #2c5f65;
    }
</style>
@endsection