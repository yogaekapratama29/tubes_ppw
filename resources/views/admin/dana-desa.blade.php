@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container p-4 rounded mb-4">
            <h4 class="mb-4 fw-semibold">Dana Desa</h4>
        <div class="balance-box text-center p-4 rounded">
            <h2 class="balance-amount mb-0 fw-bold">Rp 72.857.002</h2>
        </div>
        <div class="mt-4 mb-3">
            <h6 class="mb-3 fw-semibold">Deskripsi Alur keuangan</h6>
        </div>
        <div class="transaction-list">
            @php
                $transaksi = [
                    ['jumlah' => 205000,   'tanggal' => 'Rabu, 3 Maret 2025'],
                    ['jumlah' => 4535000,  'tanggal' => 'Senin, 25 Oktober 2025'],
                    ['jumlah' => 570000,   'tanggal' => 'Kamis, 21 Oktober 2025'],
                    ['jumlah' => 17800,    'tanggal' => 'Selasa, 15 September 2025'],
                ];
            @endphp

            @foreach($transaksi as $item)
            <div class="transaction-item d-flex justify-content-between align-items-center p-3 mb-2 rounded">
                <div class="d-flex align-items-center">
                    <i class="bi bi-arrow-down-circle text-white fs-4 me-3"></i>
                    <div>
                        <div class="fw-semibold text-white">-Rp. {{ number_format($item['jumlah'], 0, ',', '.') }}</div>
                        <small class="text-white-50">{{ $item['tanggal'] }}</small>
                    </div>
                </div>
                <a href="{{ route('dana-desa.detail') }}" class="btn btn-danger btn-sm px-3">
                    Cek
                </a>
            </div>
            @endforeach
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
</style>
@endsection