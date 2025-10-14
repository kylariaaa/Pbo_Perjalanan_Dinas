<?php

use App\Exports\riwayatcatatandinas;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanDinasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\chartController;
use App\Models\pegawai;

// Root route
Route::get('/', function () {
    return redirect()->route('login.show');
})->name('root');

// Auth routes
Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'LoginProcess'])->name('login.process');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout.process');

// Admin routes
Route::middleware(['role:admin'])->group(function () {
<<<<<<< HEAD
    Route::get('/admin', [admin::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [chartController::class, 'chartByRole'])->name('admin.dashboard');

    // Route::get ('/dashboard', function () {
    //     $jumlahpegawai = pegawai::count();
    //     return view('admin.dahsboard', compact('jumlahpegawai'));
    // });

=======
    Route::get('/admin/dashboard', [admin::class, 'index'])->name('admin.dashboard');
>>>>>>> f4257b1a7bf6b028ebd68896fc4ac3a6e43fe5ff
    Route::resource('/admin/pegawai', PegawaiController::class)->names('admin.pegawai');
    Route::resource('/admin/catatandinas', CatatanDinasController::class)->names('admin.catatan');
    Route::put('/admin/catatandinas/{id}/approved', [CatatanDinasController::class, 'Disetujui'])->name('admin.catatan.approved');
    Route::put('/admin/catatandinas/{id}/rejected', [CatatanDinasController::class, 'Ditolak'])->name('admin.catatan.rejected');

});

// Pegawai routes
Route::middleware(['role:pegawai'])->group(function () {
    Route::get('/pegawai/dashboard', [PegawaiController::class, 'show'])->name('pegawai.dashboard');
    Route::resource('/pegawai/catatandinas', CatatanDinasController::class)->names('pegawai.catatan');
});

// Route export
Route::get('/export/RCT', [ExportController::class, 'exportCatatandinas']);

//IMBACK
