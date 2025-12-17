@extends('layouts.app')

@section('title', 'Dana Desa')

@section('content')
<x-container>
    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
        <h4 class="fw-bold mb-0">Dana Desa</h4>
        <a href="{{ route('village-fund.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Baru
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
        <h4 class="fw-semibold mb-0">Total Dana Desa</h4>
        <h4 class="fw-semibold mb-0">{{ Illuminate\Support\Number::currency($total_dana ?? 0, 'IDR') }}</h4>
    </div>

    <div class="p-0 p-md-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Laporan</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($villageFunds as $villageFund)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $villageFund->created_at->format('d-m-Y H:i') ?? '-' }}</td>
                        <td>{{ $villageFund->title ?? '-' }}</td>
                        <td>{{ $villageFund->description ?? '-' }}</td>
                        <td class="text-{{ $villageFund->transaction_type == 'in' ? 'success' : 'danger' }}">{{ Illuminate\Support\Number::currency($villageFund->amount ?? 0, 'IDR') }}</td>
                        <td>{{ $villageFund->is_draft ? 'Draft' : 'Published' }}</td>
                        <td>{{ $villageFund->admin->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('village-fund.edit', $villageFund->id) }}" class="btn btn-outline-warning btn-sm">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirm" data-bs-delete-url="{{ route('village-fund.destroy', $villageFund->id) }}">
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

