@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container p-4 rounded">
         <h4 class="mb-4 fw-semibold">Dana Desa</h4>
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('dana-desa.index') }}" class="btn btn-link text-dark p-0 me-3">
                <i class="bi bi-arrow-left fs-3"></i>
            </a>
            <h5 class="fw-semibold mb-0">Keterangan Dana Desa</h5>
        </div>

        <div class="detail-card p-4 rounded">
            <div class="d-flex align-items-center mb-4">
                <div class="icon-wrapper me-3">
                    <i class="bi bi-arrow-down-circle text-white fs-1"></i>
                </div>
                <div>
                    <h3 class="mb-0 text-white fw-bold">-Rp. 205.000</h3>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="text-white mb-3 fw-semibold">Deskripsi Pengeluaran:</h6>
                <p class="text-white mb-0" style="line-height: 1.8;">
                    Pengeluaran sebesar Rp 205.000 digunakan untuk keperluan administrasi desa, yang meliputi pembelian alat tulis kantor (ATK) seperti kertas HVS, tinta printer, dan map arsip. Pengeluaran ini bertujuan untuk mendukung kelancaran operasional dan kegiatan pencatatan administrasi rutin di kantor desa.
                </p>
            </div>

            <div class="detail-info">
                <div class="info-row d-flex mb-2">
                    <div class="info-label text-white fw-semibold" style="width: 150px;">Keperluan</div>
                    <div class="text-white">: Pembelian ATK dan HVS</div>
                </div>
                <div class="info-row d-flex mb-2">
                    <div class="info-label text-white fw-semibold" style="width: 150px;">Hari/Tanggal</div>
                    <div class="text-white">: Rabu, 3 Maret 2025</div>
                </div>
                <div class="info-row d-flex">
                    <div class="info-label text-white fw-semibold" style="width: 150px;">Jumlah</div>
                    <div class="text-white">: Rp 205.000</div>
                </div>
            </div>
            <div class="text-end mt-4">
                <button type="button" class="btn btn-info px-4 fw-semibold" id="btnPublikasi">
                    Publikasi
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.white-container {
    background-color: white;
}

.detail-card {
    background: linear-gradient(135deg, #1e5a6d 0%, #2d7a8f 100%);
    border: none;
}

.icon-wrapper {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.btn-info {
    background-color: #17a2b8;
    border: none;
    padding: 10px 30px;
}

.btn-info:hover {
    background-color: #138496;
}
</style>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#btnPublikasi').on('click', function() {
        const btn = $(this);
        btn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Memproses...');

        setTimeout(() => {
            alert('Keterangan pengeluaran berhasil dipublikasikan!');
            window.location.href = "{{ route('dana-desa.index') }}";
        }, 1000);
    });
});
</script>
@endsection