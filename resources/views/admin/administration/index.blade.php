@extends('layouts.app')

@section('title', 'Administrasi')

@section('content')
<div class="container mt-4">
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
            <h4 class="fw-bold mb-0">Administrasi</h4>
            <a href="{{ route('administration.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Baru
            </a>
        </div>

        <div class="p-4">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered">
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
                            <td>{{ $administration_request->letter_type ?? '-' }}</td>
                            <td>{{ $administration_request->message ?? '-' }}</td>
                            <td>{{ $administration_request->response ?? '-' }}</td>
                            <td>{{ $administration_request->status ?? '-' }}</td>
                            <td>{{ $administration_request->user->name ?? '-' }}</td>
                            <td>{{ $administration_request->admin->name ?? '-' }}</td>
                            <td>{{ $administration_request->created_at->format('d-m-Y') ?? '-' }}</td>
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
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function () {
            initDataTable('#dataTable');
        });
    </script>
@endpush

