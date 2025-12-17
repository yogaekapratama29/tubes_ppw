@extends('layouts.app')

@section('title', isset($villageFund) ? 'Edit Dana Desa' : 'Tambah Dana Desa Baru')

@section('content')
<div class="p-2 p-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold mb-0">{{ isset($villageFund) ? 'Edit Dana Desa' : 'Tambah Dana Desa Baru' }}</h4>
        </div>
        <div class="card-body p-3 p-md-4">
            <form action="{{ isset($villageFund) ? route('village-fund.update', $villageFund->id) : route('village-fund.store') }}" method="POST">
                @csrf
                @if(isset($villageFund))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Transaksi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $villageFund->title ?? '') }}" required placeholder="Contoh: Pembangunan Jalan Desa">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="transaction_type" class="form-label">Jenis Transaksi <span class="text-danger">*</span></label>
                    <select class="form-select @error('transaction_type') is-invalid @enderror" id="transaction_type" name="transaction_type" required>
                        <option value="">-- Pilih Jenis Transaksi --</option>
                        <option value="in" @selected(old('transaction_type', $villageFund->transaction_type ?? '') == 'in')>Pemasukan</option>
                        <option value="out" @selected(old('transaction_type', $villageFund->transaction_type ?? '') == 'out')>Pengeluaran</option>
                    </select>
                    @error('transaction_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Dana (Rp) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $villageFund->amount ?? '') }}" required min="0" step="0.01" placeholder="0">
                        @error('amount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <small class="text-muted">Masukkan jumlah dalam rupiah</small>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required placeholder="Jelaskan detail penggunaan atau sumber dana...">{{ old('description', $villageFund->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <small class="text-muted">Jelaskan secara detail tentang transaksi ini</small>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input @error('is_draft') is-invalid @enderror" type="checkbox" id="is_draft" name="is_draft" value="1" @checked(old('is_draft', $villageFund->is_draft ?? true))>
                        <label class="form-check-label" for="is_draft">
                            Simpan sebagai draft
                        </label>
                        @error('is_draft')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <small class="text-muted">Draft tidak akan ditampilkan dalam laporan keuangan publik</small>
                </div>

                <input type="hidden" name="admin_id" value="{{ auth()->id() }}">

                <div class="d-flex gap-2 flex-column flex-sm-row">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        {{ isset($villageFund) ? 'Update' : 'Simpan' }}
                    </button>
                    <a href="{{ route('village-fund.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const amountInput = document.getElementById('amount');
        const transactionType = document.getElementById('transaction_type');
        
        // Format number input with thousand separator on blur
        amountInput.addEventListener('blur', function() {
            if (this.value) {
                this.value = parseFloat(this.value).toFixed(2);
            }
        });

        // Change input color based on transaction type
        // transactionType.addEventListener('change', function() {
        //     if (this.value === 'in') {
        //         amountInput.classList.remove('text-danger');
        //         amountInput.classList.add('text-success');
        //     } else if (this.value === 'out') {
        //         amountInput.classList.remove('text-success');
        //         amountInput.classList.add('text-danger');
        //     }
        // });
    });
</script>
@endpush
