@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container p-4 rounded mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 fw-semibold">Dana Desa</h4>
            @if (auth()->check() && auth()->user()->role === 'keuangan')
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Transaksi
                </a>
            @else
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Transaksi
                </a>
            @endif
        </div>
        <div class="balance-box text-center p-4 rounded mb-4">
            <h2 class="balance-amount mb-0 fw-bold">Rp 72.857.002</h2>
        </div>

        <div class="mt-4 mb-3">
            <h6 class="mb-3 fw-semibold">Deskripsi Alur Keuangan</h6>
        </div>

        <div class="transaction-list">
            @php
                $transaksi = [
                    ['id' => 1, 'jumlah' => 205000, 'tanggal' => 'Rabu, 3 Maret 2025'],
                    ['id' => 2, 'jumlah' => 4535000, 'tanggal' => 'Senin, 25 Oktober 2025'],
                    ['id' => 3, 'jumlah' => 570000, 'tanggal' => 'Kamis, 21 Oktober 2025'],
                    ['id' => 4, 'jumlah' => 17800, 'tanggal' => 'Selasa, 15 September 2025'],
                ];
            @endphp

            @foreach($transaksi as $item)
                <div class="transaction-item d-flex justify-content-between align-items-center p-3 mb-2 rounded">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-arrow-down-circle text-white fs-4 me-3"></i>
                        <div>
                            <div class="fw-semibold text-white">-Rp {{ number_format($item['jumlah'], 0, ',', '.') }}</div>
                            <small class="text-white-50">{{ $item['tanggal'] }}</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('dana-desa.detail') }}" class="btn btn-danger btn-sm px-3">
                            Cek
                        </a>
                        @if (auth()->check() && auth()->user()->role === 'keuangan')
                            <a href="#" class="btn btn-outline-warning btn-sm text-white border-white" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm text-white border-white btn-delete"
                                    data-jumlah="{{ $item['jumlah'] }}"
                                    data-tanggal="{{ $item['tanggal'] }}"
                                    data-id="{{ $item['id'] }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        @else
                            <a href="#" class="btn btn-outline-warning btn-sm text-white border-white" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm text-white border-white btn-delete"
                                    data-jumlah="{{ $item['jumlah'] }}"
                                    data-tanggal="{{ $item['tanggal'] }}"
                                    data-id="{{ $item['id'] }}">
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
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus transaksi sebesar <strong>Rp <span id="jumlahHapus"></span></strong><br>
                pada tanggal <strong><span id="tanggalHapus"></span></strong>?<br>
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
    .white-container {
        background-color: white;
    }
    .balance-box {
        background: linear-gradient(135deg, #1e5a6d 0%, #2d7a8f 100%);
        border: none;
    }
    .balance-amount {
        color: white;
        font-size: 2.5rem;
    }
    .transaction-item {
        background: linear-gradient(135deg, #1e5a6d 0%, #2d7a8f 100%);
        border: none;
        transition: transform 0.2s;
    }
    .transaction-item:hover {
        transform: translateX(5px);
    }
    .btn-outline-warning, .btn-outline-danger {
        --bs-btn-hover-bg: rgba(255, 255, 255, 0.2);
        --bs-btn-hover-border-color: white;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const jumlahHapus = document.getElementById('jumlahHapus');
        const tanggalHapus = document.getElementById('tanggalHapus');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const jumlah = this.getAttribute('data-jumlah');
                const tanggal = this.getAttribute('data-tanggal');
                const id = this.getAttribute('data-id');

                jumlahHapus.textContent = new Intl.NumberFormat('id-ID').format(jumlah);
                tanggalHapus.textContent = tanggal;
            });
        });
    });
</script>
@endsection