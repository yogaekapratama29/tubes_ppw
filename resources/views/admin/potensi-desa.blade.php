@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container-outer p-4 rounded">
        <h4 class="fw-semibold mb-4">Potensi Desa</h4>
        <div class="potensi-wrapper">
            @php
                $potensiList = [
                    ['nama' => 'Gunung Abadi', 'icon' => '🏔️', 'image' => 'gunung.jpg'],
                    ['nama' => 'Sungai Musi', 'icon' => '🏞️', 'image' => 'sungai.jpg'],
                    ['nama' => 'Pantai Panjang', 'icon' => '🏖️', 'image' => 'pantai.jpg'],
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
                <a href="{{ route('potensi-desa.detail') }}" class="btn btn-danger btn-sm px-3">
                    Cek
                </a>
            </div>
            @endforeach
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
</style>
@endsection