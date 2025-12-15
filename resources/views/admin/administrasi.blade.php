@extends('layouts.app')

@section('content')
<div class="content">
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
            <h4 class="fw-bold mb-0">Administrasi</h4>
            <a href="#" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Baru
            </a>
        </div>

        <div class="p-4">
            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Surat</th>
                        <th>Catatan</th>
                        <th>Balasan</th>
                        <th>Status</th>
                        <th>Pemohon</th>
                        <th>Admin</th>
                        <th>Tgl. Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administration_requests as $administration_request)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $administration_request->letter_type }}</td>
                        <td>{{ $administration_request->message }}</td>
                        <td>{{ $administration_request->response }}</td>
                        <td>{{ $administration_request->status }}</td>
                        <td>{{ $administration_request->user_id }}</td>
                        <td>{{ $administration_request->admin_id }}</td>
                        <td>{{ $administration_request->created_at->format('d-m-Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="p-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0">Kartu Tanda Penduduk</h6>
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center flex-grow-1">
                            <i class="bi bi-person-circle fs-4 text-muted me-3"></i>
                            <div>
                                <a href="#" class="text-decoration-none text-dark">
                                    <span class="fw-semibold">Abdul Munir</span>
                                    <small class="d-block text-muted">Pengajuan: 01 Nov 2025</small>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-warning text-dark px-3 py-2">Diproses</span>
                            @if (auth()->check() && auth()->user()->role === 'super admin')
                                <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-nama="Abdul Munir (KTP)"
                                        data-id="1">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @else
                                <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-nama="Abdul Munir (KTP)"
                                        data-id="1">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center flex-grow-1">
                            <i class="bi bi-person-circle fs-4 text-muted me-3"></i>
                            <div>
                                <a href="#" class="text-decoration-none text-dark">
                                    <span class="fw-semibold">Triadi Analdi</span>
                                    <small class="d-block text-muted">Pengajuan: 28 Okt 2025</small>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary px-3 py-2">Selesai</span>
                            @if (auth()->check() && auth()->user()->role === 'admin')
                                <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-nama="Triadi Analdi (KTP)"
                                        data-id="2">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @else
                                <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-nama="Triadi Analdi (KTP)"
                                        data-id="2">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @endif
                        </div>
                    </div>

                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 hover-bg-light">
                        <div class="d-flex align-items-center flex-grow-1">
                            <i class="bi bi-person-circle fs-4 text-muted me-3"></i>
                            <div>
                                <a href="#" class="text-decoration-none text-dark">
                                    <span class="fw-semibold">Vini Andini</span>
                                    <small class="d-block text-muted">Pengajuan: 25 Okt 2025</small>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-danger px-3 py-2">Ditolak</span>
                            @if (auth()->check() && auth()->user()->role === 'admin')
                                <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-nama="Vini Andini (KTP)"
                                        data-id="3">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @else
                                <a href="#" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-nama="Vini Andini (KTP)"
                                        data-id="3">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus pengajuan <strong id="namaHapus"></strong>?<br>
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
        padding-left: 1.5rem;
    }
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 6px;
        min-width: 80px;
        text-align: center;
    }
    .hover-bg-light:hover { background-color: #f8f9fa !important; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const namaHapus = document.getElementById('namaHapus');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const nama = this.getAttribute('data-nama');
                namaHapus.textContent = nama;
            });
        });
    });
</script>
@endsection

@push('scripts')
    <script>
        $(function () {
            initDataTable('#dataTable');
        });
    </script>
@endpush

