@extends('layouts.app')

@section('content')
<div class="content">
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <h4 class="fw-bold p-4 mb-0 border-bottom">Profil Desa</h4>
        <div class="position-relative" style="margin-bottom: 80px;">
            <div class="position-relative">
                <img src="{{ asset('assets/sampul.png') }}" 
                     class="w-100" 
                     style="height: 200px; object-fit: cover;" 
                     alt="Cover Desa">
                <button class="btn btn-primary btn-sm position-absolute top-0 end-0 m-3">
                    <i class="bi bi-upload me-1"></i> Unggah Gambar
                </button>
            </div>
            <div class="position-absolute start-0 ms-4" 
                 style="bottom: -60px;">
                <div class=" rounded-3  d-flex align-items-center justify-content-center" 
                     style="width: 140px; height: 140px; padding: 1.5rem;">
                    <img src="{{ asset('assets/logo.png') }}" 
                         alt="Logo Desa" 
                         style="width: 100%; height: 100%; object-fit: contain;">
                </div>
            </div>
        </div>
        <div class="px-4 pb-4">
            <div class="mb-3">
                <h5 class="fw-bold mb-2">Desa Kembaran Wetan</h5>
                <p class="text-muted mb-3">
                    <i class="bi bi-geo-alt-fill"></i> Kaligondang, Purbalingga
                </p>
                <div class="d-flex gap-3 mb-4">
                    <button class="btn btn-link text-primary text-decoration-none p-0 fw-medium">
                        Ubah
                    </button>
                    <button class="btn btn-link text-danger text-decoration-none p-0 fw-medium">
                        Hapus
                    </button>
                </div>
            </div>
            <div class="mb-4">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr>
                            <td class="text-dark fw-semibold ps-0" style="width: 150px;">Nama Desa</td>
                            <td class="text-muted">Kembaran Wetan</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">Alamat</td>
                            <td class="text-muted">Desa Kembaran Wetan, Kecamatan Kaligondang, Kabupaten Purbalingga, Jawa Jawa Tengah Indonesia (5...</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">Email</td>
                            <td class="text-muted">kembaranwetan@gmail.com</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">No Hp</td>
                            <td class="text-muted">082257336927</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <label class="form-label text-muted mb-2">Deskripsi Desa :</label>
                <div class="bg-light rounded-3 p-3" style="min-height: 100px;">
                    <textarea class="form-control border-0 bg-transparent" 
                              rows="4" 
                              placeholder="Masukkan deskripsi desa..."
                              style="resize: none;"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .content {
        padding: 1.5rem;
    }
    
    .table td {
        padding: 0.75rem 0.5rem;
        vertical-align: top;
    }
    
    .btn-link:hover {
        opacity: 0.8;
    }
</style>
@endsection