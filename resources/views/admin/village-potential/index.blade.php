@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')
<x-container>
    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
        <h4 class="fw-bold mb-0">Potensi Desa</h4>
        <a href="{{ route('village-potential.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Baru
        </a>
    </div>

    <div class="p-0 p-md-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($village_potentials as $village_potential)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $village_potential->name ?? '-' }}</td>
                        <td>{{ $village_potential->address ?? '-' }}</td>
                        <td>{{ $village_potential->description ?? '-' }}</td>
                        <td>{{ $village_potential->is_draft ? 'Draft' : 'Published' }}</td>
                        <td>{{ $village_potential->author->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('village-potential.edit', $village_potential->id) }}" class="btn btn-outline-warning btn-sm">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirm" data-bs-delete-url="{{ route('village-potential.destroy', $village_potential->id) }}">
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

