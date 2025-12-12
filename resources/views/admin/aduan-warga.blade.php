@extends('layouts.app')

@section('content')
<div class="content">
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <div class="p-4 border-bottom">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold mb-0">Aduan Warga</h4>

                @if (auth()->check() && auth()->user()->role === 'admin')
                    <a href="#" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Aduan
                    </a>
                @else
            
                    <a href="#" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Aduan
                    </a>
                @endif
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-dark btn-sm px-3">Diproses</button>
                <button class="btn btn-outline-dark btn-sm px-3">Selesai</button>
            </div>
        </div>

        <div class="list-group list-group-flush">
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <a href="{{ route('aduan.detail') }}" class="text-decoration-none text-dark">
                            <span class="fw-semibold">Abdul Munir</span>
                            <small class="d-block text-muted">Kebersihan Desa</small>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('aduan.detail') }}" class="btn btn-danger btn-sm px-4">Cek</a>
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                data-nama="Abdul Munir" data-jenis="Kebersihan Desa" data-id="1">
                            <i class="bi bi-trash"></i>
                        </button>
                    @else
                        <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                data-nama="Abdul Munir" data-jenis="Kebersihan Desa" data-id="1">
                            <i class="bi bi-trash"></i>
                        </button>
                    @endif
                </div>
            </div>
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <a href="{{ route('aduan.detail') }}" class="text-decoration-none text-dark">
                            <span class="fw-semibold">Ahmad Mubarak</span>
                            <small class="d-block text-muted">Infrastruktur Jalan</small>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('aduan.detail') }}" class="btn btn-danger btn-sm px-4">Cek</a>
                    @if (auth()->check() && auth()->user()->role === 'super admin')
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                data-nama="Ahmad Mubarak" data-jenis="Infrastruktur Jalan" data-id="2">
                            <i class="bi bi-trash"></i>
                        </button>
                    @else
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                data-nama="Ahmad Mubarak" data-jenis="Infrastruktur Jalan" data-id="2">
                            <i class="bi bi-trash"></i>
                        </button>
                    @endif
                </div>
            </div>

            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                        <i class="bi bi-megaphone text-primary fs-5"></i>
                    </div>
                    <div>
                        <a href="{{ route('aduan.detail') }}" class="text-decoration-none text-dark">
                            <span class="fw-semibold">Syaif'i Anwar Batir</span>
                            <small class="d-block text-muted">Penerangan Jalan</small>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('aduan.detail') }}" class="btn btn-danger btn-sm px-4">Cek</a>
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                data-nama="Syaif'i Anwar Batir" data-jenis="Penerangan Jalan" data-id="3">
                            <i class="bi bi-trash"></i>
                        </button>
                    @else
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                data-nama="Syaif'i Anwar Batir" data-jenis="Penerangan Jalan" data-id="3">
                            <i class="bi bi-trash"></i>
                        </button>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus aduan dari <strong id="namaHapus"></strong> (<span id="jenisHapus"></span>)?<br>
                Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="#" method="POST" id="deleteForm" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .content { padding: 1.5rem; }
    .list-group-item {
        border-left: none;
        border-right: none;
        transition: all 0.2s ease;
    }
    .list-group-item:first-child { border-top: none; }
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
        color: white;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const namaHapus = document.getElementById('namaHapus');
        const jenisHapus = document.getElementById('jenisHapus');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const nama = this.getAttribute('data-nama');
                const jenis = this.getAttribute('data-jenis');
                const id = this.getAttribute('data-id');

                namaHapus.textContent = nama;
                jenisHapus.textContent = jenis;
            });
        });
    });
</script>
@endsection