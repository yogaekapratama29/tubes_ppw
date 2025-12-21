<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HealthInformationController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\VillageFundController;
use App\Http\Controllers\VillagePotentialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('register', [AuthController::class, 'registerProcess'])->name('register');
        Route::post('login', [AuthController::class, 'loginProcess'])->name('login');
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('user', [AuthController::class, 'show'])->name('user');
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/village/user', [VillageController::class, 'getUserVillage']);

        Route::resource('administration', AdministrationController::class);
        Route::get('administration/user/{user}', [AdministrationController::class, 'getByUser'])->name('administration.get_by_user');
        
        Route::resource('citizen-report', AdministrationController::class);
        Route::get('citizen-report/user/{user}', [AdministrationController::class, 'getByUser'])->name('administration.get_by_user');

        Route::resource('village-potential', VillagePotentialController::class);
        Route::resource('village-fund', VillageFundController::class);
        Route::resource('health-information', HealthInformationController::class);
        
        // Route::resource('group', GroupController::class);
        
        // Route::resource('user', UserController::class);
        
        // Route::resource('record', RecordController::class);
        // Route::get('record/user/{userId}', [RecordController::class, 'getByUser'])->name('record.by_user');
        // Route::get('record/group/{groupId}', [RecordController::class, 'getByGroup'])->name('record.by_group');
        
        // Route::resource('tracking', TrackingController::class);
        
        // Route::resource('simpanan', SimpananController::class);
        
        // Route::resource('setoran', SetoranController::class);
        // Route::get('setoran/user/{userId}', [SetoranController::class, 'getByUser'])->name('setoran.by_user');
    });
});
