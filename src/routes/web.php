<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;

// --- HALAMAN UTAMA (Membuka welcome.blade.php dengan Data) ---
Route::get('/', [PortofolioController::class, 'index'])->name('welcome');

// --- PENGIRIMAN FORM KUMPUL TUGAS (Sudah Diupdate) ---
Route::post('/kumpul-tugas', [ContactController::class, 'storeTugas'])->name('tugas.store');

// --- PANEL ADMIN (Untuk CRUD & Update Progress Laporan) ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [PortofolioController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('portofolio', PortofolioController::class)->except(['index']);
});

// --- JALUR SAKTI TANPA TERMINAL ---
Route::get('/rakit-database', function() {
    Artisan::call('migrate:fresh');
    return "Mantap bro! Tabel udah otomatis dibuat tanpa terminal. Sekarang balik ke uts.test";
});