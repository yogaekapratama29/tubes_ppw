@extends('layouts.app')

@section('title', 'Informasi Kesehatan')

@section('content')
<x-container>
    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
        <h4 class="fw-bold mb-0">Informasi Kesehatan</h4>
        <a href="{{ route('health-information.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Baru
        </a>
    </div>

    <div class="p-0 p-md-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Acara</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($health_information as $info)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $info->title ?? '-' }}</td>
                        <td>{{ $info->event_date ? \Carbon\Carbon::parse($info->event_date)->format('d M Y') : '-' }}</td>
                        <td>{{ $info->location ?? '-' }}</td>
                        <td>{{ Str::limit($info->description, 50) ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $info->is_draft ? 'bg-warning' : 'bg-success' }}">
                                {{ $info->is_draft ? 'Draft' : 'Published' }}
                            </span>
                        </td>
                        <td>{{ $info->author->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('health-information.edit', $info->id) }}" class="btn btn-outline-warning btn-sm">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirm" data-bs-delete-url="{{ route('health-information.destroy', $info->id) }}">
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

