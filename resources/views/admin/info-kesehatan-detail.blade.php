@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container-outer p-4 rounded">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('info-kesehatan.index') }}" class="btn btn-link text-dark p-0 me-3">
                <i class="bi bi-arrow-left fs-3"></i>
            </a>
            <h5 class="fw-semibold mb-0">Keterangan Info Kesehatan</h5>
        </div>
        <div class="detail-card p-4 rounded">
            <div class="d-flex align-items-center mb-4">
                <div class="icon-wrapper me-3">
                    <i class="bi bi-house-heart text-white fs-1"></i>
                </div>
                <div>
                    <h4 class="mb-0 text-white fw-bold">Posyandu Kesehatan</h4>
                </div>
            </div>
            <div class="mb-4">
                <h6 class="text-white mb-3 fw-semibold">Deskripsi Kegiatan:</h6>
                <p class="text-white mb-0" style="line-height: 1.8;">
                    Posyandu (Pos Pelayanan Terpadu) untuk meningkatkan derajat kesehatan masyarakat, terutama ibu hamil, bayi, balita, dan lansia. Program ini bertujuan untuk memberikan pelayanan dasar secara manual, dilakukan secara berkala di Posyandu. Program ini berfungsi untuk memfasilitasi pemantauan kesehatan, imunisasi, penyuluhan kesehatan, serta upaya promotif dan preventif. Kegiatan di Posyandu juga berfungsi untuk mendeteksi dini masalah kesehatan seperti gizi buruk, stunting, serta mendukung program pemerintah dalam meningkatkan angka kelahiran ibu dan anak.
                </p>
            </div>
            <div class="detail-info">
                <div class="info-row d-flex mb-2">
                    <div class="info-label text-white fw-semibold" style="width: 150px;">Keperluan</div>
                    <div class="text-white">: Posyandu Kesehatan</div>
                </div>
                <div class="info-row d-flex mb-2">
                    <div class="info-label text-white fw-semibold" style="width: 150px;">Hari/Tanggal</div>
                    <div class="text-white">: Minggu, 25 April 2025</div>
                </div>
                <div class="info-row d-flex">
                    <div class="info-label text-white fw-semibold" style="width: 150px;">Tempat</div>
                    <div class="text-white">: Rumah Bapak Naim</div>
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
.white-container-outer {
    background-color: white;
}

.detail-card {
    background: linear-gradient(135deg, #1e5a6d 0%, #2d7a8f 100%);
    border: none;
}

.icon-wrapper {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
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
    $('#btnPublikasi').off('click').on('click', function() {
        const btn = $(this);
        btn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Memproses...');

        setTimeout(() => {
            alert('Info kesehatan berhasil dipublikasikan!');
            window.location.href = "{{ route('administrasi.success') }}";
        }, 1000);
    });
});

</script>
@endsection