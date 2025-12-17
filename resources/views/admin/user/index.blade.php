@extends('layouts.app')

@section('title', 'Daftar Warga')

@section('content')
<x-container>
    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
        <h4 class="fw-bold mb-0">Daftar Warga</h4>
        <a href="{{ route('user.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Buat Akun Warga
        </a>
    </div>

    <div class="p-0 p-md-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>NIK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name ?? '-' }}</td>
                        <td>{{ $user->email ?? '-' }}</td>
                        <td>{{ $user->phone ?? '-' }}</td>
                        <td>{{ $user->role ?? '-' }}</td>
                        <td>{{ $user->national_id ?? '-' }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-warning btn-sm">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirm" data-bs-delete-url="{{ route('user.destroy', $user->id) }}">
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

