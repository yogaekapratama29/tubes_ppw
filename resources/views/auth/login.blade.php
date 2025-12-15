@extends('layouts.guest')

@section('title', 'Login')

@section('style')
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #115967;
      color: #222;
      padding: 1.5rem;
    }

    .login-card {
      width: 100%;
      max-width: 420px;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      overflow: hidden;
    }

    .card-body { padding: 2rem; }
    .form-control:focus { box-shadow: none; }

    .brand {
      height: 72px;
      width: 72px;
      border-radius: 0.75rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: rgba(255,255,255,0.9);
      margin-bottom: 0.75rem;
    }

    .text-muted-small { font-size: 0.9rem; }
  </style>
@endsection

@section('content')
  <div class="card login-card">
    <div class="card-body">
      <div class="text-center mb-3">
        <div class="brand mx-auto">
          <i class="bi bi-person-circle fs-1 text-primary"></i>
        </div>
        <h4 class="mb-0">Selamat datang</h4>
        <p class="text-muted-small">Masukkan kredensial Anda untuk login</p>
      </div>


      <!-- Form login -->
      <form id="loginForm" class="needs-validation" novalidate method="POST" action="{{ route('login.process') }}">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          {{ $errors->first('email') ?? $errors->first('password') ?? __('auth.failed') }}
        </div>
        @endif

        <div class="mb-3">
          <label for="emailInput" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>


        <div class="mb-3 position-relative">
          <label for="passwordInput" class="form-label">Password</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" placeholder="••••••••" minlength="6" required>
            <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Tampilkan kata sandi">
              <i class="bi bi-eye-fill" id="toggleIcon"></i>
            </button>
          </div>
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>


        {{-- <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="rememberCheck">
            <label class="form-check-label" for="rememberCheck">Ingat saya</label>
          </div>
          <a href="#" class="small text-decoration-none">Lupa kata sandi?</a>
        </div> --}}


        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary btn-lg">Login</button>
        </div>


        {{-- <div class="text-center mb-2">
          <small class="text-muted">atau masuk dengan</small>
        </div> --}}


        {{-- <div class="d-flex gap-2 justify-content-center mb-3">
          <button type="button" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-google"></i> Google
          </button>
          <button type="button" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-facebook"></i> Facebook
          </button>
        </div> --}}


        {{-- <p class="text-center small text-muted mb-0">Belum punya akun? <a href="#">Daftar</a></p> --}}
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script>
    // Validasi form bootstrap
    {{-- (function () {
      'use strict'
      const form = document.getElementById('loginForm')
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        } else {
          // Di sini Anda bisa mengganti dengan panggilan fetch/axios ke API autentikasi
          event.preventDefault();
          alert('Berhasil melewati validasi. Kirimkan data ke server di sini.');
        }
        form.classList.add('was-validated')
      }, false)
    })() --}}


    // Toggle show/hide password
    const togglePassword = document.getElementById('togglePassword')
    const passwordInput = document.getElementById('passwordInput')
    const toggleIcon = document.getElementById('toggleIcon')
    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password'
      passwordInput.setAttribute('type', type)
      // ganti ikon
      if (type === 'text') {
        toggleIcon.classList.remove('bi-eye-fill')
        toggleIcon.classList.add('bi-eye-slash-fill')
        togglePassword.setAttribute('aria-label', 'Sembunyikan kata sandi')
      } else {
        toggleIcon.classList.remove('bi-eye-slash-fill')
        toggleIcon.classList.add('bi-eye-fill')
        togglePassword.setAttribute('aria-label', 'Tampilkan kata sandi')
      }
    })
  </script>
@endsection