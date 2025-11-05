<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Pandawa</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body { background-color: #1c4a50; font-family: 'Poppins', sans-serif; }
    .sidebar { background-color: #124045; min-height: 100vh; color: white; padding-top: 20px; }
    .sidebar a { color: white; text-decoration: none; display: flex; align-items: center; gap: 8px; padding: 10px 15px; border-radius: 8px; margin-bottom: 8px; font-weight: 500; }
    .sidebar a:hover, .sidebar a.active { background-color: #0b2f32; }
    .content { background-color: #f4f6f7; border-radius: 12px; padding: 20px; margin-top: 20px; }
  </style>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
      <div class="d-flex align-items-center">
        <button class="btn btn-dark d-md-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
          <i class="bi bi-list fs-4"></i>
        </button>
        <a class="navbar-brand fw-bold" href="#">ADMIN PANDAWA</a>
      </div>

      <div class="d-flex align-items-center text-white">
        <div class="me-3 position-relative">
          <i class="bi bi-bell fs-5"></i>
          <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        </div>
        <div class="vr mx-3"></div>
        <div class="d-flex align-items-center">
          <img src="{{ 'assets/profile.jpeg' }}" class="rounded-circle me-2" alt="Profile" height="50px" width="50px">
          <div class="text-white small">
            <strong>Andreaz Karly</strong><br>
            <small>andreaz.karly@gmail.com</small>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="sidebarMenu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Menu</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-3">
      @include('admin.partials.sidebar')
    </div>
  </div>
  <div class="container-fluid" style="margin-top: 80px;">
    <div class="row">
      <div class="col-md-3 col-lg-2 d-none d-md-block sidebar p-3">
        @include('admin.partials.sidebar')
      </div>
      <div class="col-md-9 col-lg-10 p-4">
        @yield('content')
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @yield('scripts')
</body>
</html>