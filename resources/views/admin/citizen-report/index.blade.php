@extends('layouts.app')

@section('title', 'Aduan Warga')

@section('content')
<x-container>
    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
        <h4 class="fw-bold mb-0">Aduan Warga</h4>
        <a href="{{ route('citizen-report.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Aduan Baru
        </a>
    </div>

    <div class="p-0 p-md-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemohon</th>
                        <th>Catatan</th>
                        <th>Balasan</th>
                        <th>Admin</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citizen_reports as $citizen_report)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $citizen_report->user->name ?? '-' }}</td>
                        <td>{{ $citizen_report->message ?? '-' }}</td>
                        <td>{{ $citizen_report->response ?? '-' }}</td>
                        <td>{{ $citizen_report->admin->name ?? '-' }}</td>
                        <td>{{ $citizen_report->status ?? '-' }}</td>
                        <td>
                            <a href="{{ route('citizen-report.edit', $citizen_report->id) }}" class="btn btn-outline-warning btn-sm">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirm" data-bs-delete-url="{{ route('citizen-report.destroy', $citizen_report->id) }}">
                              <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-delete-confirm />
</x-container>
@endsection

@push('scripts')
    <script>
        $(function () {
            initDataTable('#dataTable');
        });
    </script>
@endpush

