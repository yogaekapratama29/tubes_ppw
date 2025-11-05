@php
  $currentPath = request()->path(); 
@endphp

<a href="{{ route('profile-desa.index') }}"
   class="{{ $currentPath === '' || str_starts_with($currentPath, 'profile-desa') ? 'active' : '' }}">
  <i class="bi bi-house-door"></i> Profil Desa
</a>

<a href="{{ route('administrasi.index') }}"
   class="{{ str_starts_with($currentPath, 'admin') && !str_contains($currentPath, 'aduan') ? 'active' : '' }}">
  <i class="bi bi-file-earmark-text"></i> Administrasi
</a>

<a href="{{ route('aduan.index') }}"
   class="{{ str_starts_with($currentPath, 'admin/aduan-warga') ? 'active' : '' }}">
  <i class="bi bi-chat-dots"></i> Aduan Warga
</a>

<a href="{{ route('potensi-desa.index') }}"
   class="{{ str_starts_with($currentPath, 'potensi-desa') ? 'active' : '' }}">
  <i class="bi bi-bar-chart"></i> Potensi Desa
</a>

<a href="{{ route('dana-desa.index') }}"
   class="{{ str_starts_with($currentPath, 'dana-desa') ? 'active' : '' }}">
  <i class="bi bi-cash-stack"></i> Dana Desa
</a>

<a href="{{ route('info-kesehatan.index') }}"
   class="{{ str_starts_with($currentPath, 'info-kesehatan') ? 'active' : '' }}">
  <i class="bi bi-heart-pulse"></i> Info Kesehatan
</a>