@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container-outer p-4 rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-semibold mb-0">Info Kesehatan</h4>

            @if (auth()->check() && auth()->user()->role === 'admin')
                <a href="#" class="btn btn-primary px-4">
                    <i class="bi bi-plus-circle me-1"></i> Buat Pengumuman
                </a>
            @else
                <a href="#" class="btn btn-primary px-4">
                    <i class="bi bi-plus-circle me-1"></i> Buat Pengumuman
                </a>
            @endif
        </div>

        <div class="programs-wrapper">
            @php
                $programs = [
                    ['id' => 1, 'nama' => 'Posyandu', 'icon' => 'bi-house-heart'],
                    ['id' => 2, 'nama' => 'Vaksin Difteri', 'icon' => 'bi-droplet-half'],
                    ['id' => 3, 'nama' => 'Vaksin Cacar', 'icon' => 'bi-bandaid'],
                    ['id' => 4, 'nama' => 'Cuaca & Kesehatan', 'icon' => 'bi-cloud-sun'],
                    ['id' => 5, 'nama' => 'Wejang Desa', 'icon' => 'bi-megaphone'],
                ];
            @endphp

            @foreach($programs as $program)
                <div class="program-item d-flex justify-content-between align-items-center p-3 mb-3 rounded">
                    <div class="d-flex align-items-center">
                        <i class="{{ $program['icon'] }} text-white fs-3 me-3"></i>
                        <span class="text-white fw-semibold">{{ $program['nama'] }}</span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('info-kesehatan.detail') }}" class="btn btn-danger btn-sm px-3">
                            Cek
                        </a>
                        @if (auth()->check() && auth()->user()->role === 'admin')
                            <a href="#" class="btn btn-outline-warning btn-sm text-white border-white" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm text-white border-white btn-delete"
                                    data-nama="{{ $program['nama'] }}"
                                    data-id="{{ $program['id'] }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        @else
                            <a href="#" class="btn btn-outline-warning btn-sm text-white border-white" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm text-white border-white btn-delete"
                                    data-nama="{{ $program['nama'] }}"
                                    data-id="{{ $program['id'] }}">
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
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Info Kesehatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus pengumuman <strong id="namaHapus"></strong>?<br>
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
    .program-item {
        background: linear-gradient(135deg, #1e5a6d 0%, #2d7a8f 100%);
        border: none;
        transition: transform 0.2s;
    }
    .program-item:hover {
        transform: translateX(5px);
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
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