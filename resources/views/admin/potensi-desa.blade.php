@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container-outer p-4 rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-semibold mb-0">Potensi Desa</h4>
            @if (auth()->check() && auth()->user()->role === 'admin')
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Potensi
                </a>
            @else
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Potensi (Testing)
                </a>
            @endif
        </div>

        <div class="potensi-wrapper">
            @php
                $potensiList = [
                    ['id' => 1, 'nama' => 'Gunung Abadi', 'icon' => '🏔️', 'image' => 'gunung.jpg'],
                    ['id' => 2, 'nama' => 'Sungai Musi', 'icon' => '🏞️', 'image' => 'sungai.jpg'],
                    ['id' => 3, 'nama' => 'Pantai Panjang', 'icon' => '🏖️', 'image' => 'pantai.jpg'],
                ];
            @endphp

            @foreach($potensiList as $potensi)
                <div class="potensi-item d-flex justify-content-between align-items-center p-3 mb-3 rounded">
                    <div class="d-flex align-items-center">
                        <div class="potensi-icon me-3">
                            <span style="font-size: 2.5rem;">{{ $potensi['icon'] }}</span>
                        </div>
                        <span class="text-white fw-semibold fs-5">{{ $potensi['nama'] }}</span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('potensi-desa.detail') }}" class="btn btn-danger btn-sm px-3">
                            Cek
                        </a>
                        @if (auth()->check() && auth()->user()->role === 'admin')
                            <a href="#" class="btn btn-outline-warning btn-sm text-white border-white" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm text-white border-white btn-delete"
                                    data-nama="{{ $potensi['nama'] }}"
                                    data-id="{{ $potensi['id'] }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        @else
                            <a href="#" class="btn btn-outline-warning btn-sm text-white border-white" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm text-white border-white btn-delete"
                                    data-nama="{{ $potensi['nama'] }}"
                                    data-id="{{ $potensi['id'] }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Potensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus potensi desa <strong id="namaHapus"></strong>?<br>
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
    .white-container-outer {
        background-color: white;
    }
    .potensi-item {
        background: linear-gradient(135deg, #1e5a6d 0%, #2d7a8f 100%);
        border: none;
        transition: transform 0.2s;
    }
    .potensi-item:hover {
        transform: translateX(5px);
    }
    .potensi-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 10px;
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
        padding: 8px 20px;
    }
    .btn-danger:hover {
        background-color: #bb2d3b;
    }
    .btn-outline-warning, .btn-outline-danger {
        --bs-btn-hover-bg: rgba(255, 255, 255, 0.2);
        --bs-btn-hover-border-color: white;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const namaHapus = document.getElementById('namaHapus');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const nama = this.getAttribute('data-nama');
                const id = this.getAttribute('data-id');

                namaHapus.textContent = nama;
            });
        });
    });
</script>
@endsection