@extends('layouts.app')

@section('content')
<div class="content-card shadow-sm">
    <div class="white-container-outer p-4 rounded">
        <h4 class="fw-semibold mb-4">Potensi Desa</h4>
        <div class="detail-card rounded overflow-hidden">
            <div class="hero-section position-relative">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&h=400&fit=crop" 
                     alt="Gunung Abadi" 
                     class="w-100" 
                     style="height: 300px; object-fit: cover;">
                <span class="badge bg-primary position-absolute" style="top: 15px; right: 15px; font-size: 0.9rem;">
                    Gunung Abadi
                </span>
            </div>
            <div class="content-section p-4">
                <h4 class="fw-bold mb-3">Gunung Abadi</h4>
                <p class="text-muted mb-2">
                    <i class="bi bi-geo-alt-fill"></i> Jl. Andalan No.5, Kebumen Wetan, Kecamatan Kaligondang, Kabupaten Purbalingga, Jawa Jawa Tengah Indonesia (5...)
                </p>
                <div class="info-table mt-4">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="fw-semibold" style="width: 150px;">Nama Wisata</td>
                                <td>: Gunung Abadi</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Alamat</td>
                                <td>: Desa Kembaran Wetan, Kecamatan Kaligondang, Kabupaten Purbalingga, Jawa Jawa Tengah Indonesia (5...)</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Email</td>
                                <td>: kembaranwetan@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">No Hp</td>
                                <td>: 082257336827</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <label class="form-label fw-semibold">Deskripsi Wisata :</label>
                    <textarea class="form-control" rows="4" readonly style="background-color: #f8f9fa; border: 1px solid #dee2e6;">Gunung Abadi merupakan destinasi wisata alam yang menawarkan pemandangan spektakuler dan udara segar. Terletak di kawasan pegunungan, tempat ini cocok untuk pendakian, camping, dan menikmati keindahan alam.</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.white-container-outer {
    background-color: white;
}

.detail-card {
    background-color: white;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.hero-section {
    position: relative;
}

.badge {
    padding: 8px 16px;
}

.content-section {
    background-color: white;
}

.table td {
    padding: 0.75rem 0.5rem;
    vertical-align: top;
}

.form-control:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}
</style>
@endsection