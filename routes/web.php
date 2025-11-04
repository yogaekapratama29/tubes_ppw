<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.profile-desa');
})->name('profile-desa.index');

Route::get('/admin', function () {
    return view('admin.administrasi');
})->name('administrasi.index');

Route::get('/admin/detail', function () {
    return view('admin.administrasi-detail');
})->name('administrasi.detail');

Route::get('/admin/success', function () {
    return view('admin.success');
})->name('administrasi.success');

Route::get('/admin/aduan-warga', function () {
    return view('admin.aduan-warga');
})->name('aduan.index');

Route::get('/admin/aduan-warga/detail', function () {
    return view('admin.aduan-warga-detail');
})->name('aduan.detail');

Route::get('/dana-desa', function () {
    return view('admin.dana-desa');
})->name('dana-desa.index');

Route::get('/dana-desa/detail', function () {
    return view('admin.dana-desa-detail');
})->name('dana-desa.detail');

Route::get('/info-kesehatan', function () {
    return view('admin.info-kesehatan');
})->name('info-kesehatan.index');

Route::get('/info-kesehatan/detail', function () {
    return view('admin.info-kesehatan-detail');
})->name('info-kesehatan.detail');

Route::get('/potensi-desa', function () {
    return view('admin.potensi-desa');
})->name('potensi-desa.index');

Route::get('/potensi-desa/detail', function () {
    return view('admin.potensi-desa-detail');
})->name('potensi-desa.detail');