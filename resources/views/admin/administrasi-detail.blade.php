<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Pandawa - Detail Administrasi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body { background-color: #1c4a50; font-family: 'Poppins', sans-serif; }
  .content { background-color: #f4f6f7; border-radius: 12px; padding: 20px; margin-top: 100px; }
</style>
</head>
<body>

<div class="container">
  <div class="content shadow-sm">
    <h5 class="fw-bold">Keterangan Administrasi</h5>
    <hr>
    <p><strong>Nama:</strong> Abdul Munir</p>
    <p><strong>NIK:</strong> 33101402040002</p>
    <p><strong>Keperluan:</strong> Pengajuan Perpanjang KTP</p>
    <p><strong>No HP:</strong> 081325221819</p>

    <div class="d-flex justify-content-end gap-2 mt-4">
      <a href="{{ route('administrasi.success') }}" class="btn btn-danger">Tolak</a>
      <a href="{{ route('administrasi.success') }}" class="btn btn-success">Setujui</a>
    </div>
  </div>
</div>

</body>
</html>
