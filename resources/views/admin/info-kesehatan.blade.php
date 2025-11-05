@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container-outer p-4 rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-semibold mb-0">Info Kesehatan</h4>
            <a href="#" class="btn btn-danger px-4">
                Buat Pengumuman
            </a>
        </div>
        <div class="programs-wrapper">
            @php
                $programs = [
                    ['nama' => 'Posyandu', 'icon' => 'bi-house-heart'],
                    ['nama' => 'Vaksin Difoteri', 'icon' => 'bi-house-heart'],
                    ['nama' => 'Vaksin Cacar', 'icon' => 'bi-house-heart'],
                    ['nama' => 'Cuaca na Kesehatan', 'icon' => 'bi-house-heart'],
                    ['nama' => 'Wejang Desa', 'icon' => 'bi-house-heart'],
                ];
            @endphp

            @foreach($programs as $program)
            <div class="program-item d-flex justify-content-between align-items-center p-3 mb-3 rounded">
                <div class="d-flex align-items-center">
                    <i class="{{ $program['icon'] }} text-white fs-3 me-3"></i>
                    <span class="text-white fw-semibold">{{ $program['nama'] }}</span>
                </div>
                <a href="{{ route('info-kesehatan.detail') }}" class="btn btn-danger btn-sm px-3">
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
</style>
@endsection