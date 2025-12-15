<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Datatables.net --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
      /* Offcanvas as sidebar menu */
      @media (min-width: 768px) {
        .offcanvas-push {
          position: static;
          transform: none !important;
          visibility: visible !important;
          width: 280px !important;
        }

        .content-push {
          /* margin-left: 280px; */
        }
      }

      .offcanvas-custom {
        --bs-offcanvas-bg: #124045;
        --bs-offcanvas-color: #e5e7eb;
      }

      .content-push {
        min-height: 100vh;
        background-color: #1c4a50;
      }

      .offcanvas .nav-link {
        color: #adb5bd;
        border-radius: 0.5rem;
      }

      .offcanvas .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
      }

      .offcanvas .nav-link.active {
        background-color: #0d6efd;
        color: #fff;
      }
    </style>
    @yield('style')
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" aria-expanded="false" aria-label="Toggle sidebar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="bi bi-bell fs-5"></i>
              </a>
            </li>
          </ul>
          <div class="vr mx-3 text-white"></div>
          <div class="d-flex align-items-center gap-2">
            <img src="{{ 'assets/profile.jpeg' }}" alt="Profile" width="50" height="50" class="d-inline-block align-text-top rounded-circle">
            <div class="text-white">
              <p class="m-0 fw-semibold">{{ auth()->user()->name }}</p>
              <p class="m-0">{{ auth()->user()->email }}</p>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="d-flex">
      {{-- Menu Sidebar --}}
      <div class="offcanvas offcanvas-start show border-0 offcanvas-custom offcanvas-push" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close d-block d-md-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <nav class="nav nav-pills flex-column">
            <a href="{{ route('profile-desa.index') }}"
              class="nav-link {{ request()->is('/') || request()->routeIs('profile-desa.*') ? 'active' : '' }}">
              <i class="bi bi-house-door"></i> Profil Desa
            </a>

            @if (auth()->check() && auth()->user()->role !== 'keuangan')
              <a href="{{ route('administration.index') }}"
                class="nav-link {{ request()->routeIs('administration.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Administrasi
              </a>

              <a href="{{ route('aduan.index') }}"
                class="nav-link {{ request()->routeIs('aduan.*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i> Aduan Warga
              </a>

              <a href="{{ route('potensi-desa.index') }}"
                class="nav-link {{ request()->routeIs('potensi-desa.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart"></i> Potensi Desa
              </a>
            @endif

            <a href="{{ route('dana-desa.index') }}"
              class="nav-link {{ request()->routeIs('dana-desa.*') ? 'active' : '' }}">
              <i class="bi bi-cash-stack"></i> Dana Desa
            </a>

            @if (auth()->check() && auth()->user()->role !== 'kesehatan')
              <a href="{{ route('info-kesehatan.index') }}"
                class="nav-link {{ request()->routeIs('info-kesehatan.*') ? 'active' : '' }}">
                <i class="bi bi-heart-pulse"></i> Info Kesehatan
              </a>
            @endif
          </nav>
        </div>
      </div>

      <div class="flex-fill content-push">
        @yield('content')
      </div>
    </div>
    
    {{-- Datatables.net --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    
    @yield('script')
    @stack('scripts')
  </body>
</html>