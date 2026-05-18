<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;

// --- HALAMAN UTAMA (Membuka welcome.blade.php dengan Data) ---
Route::get('/', [PortofolioController::class, 'index'])->name('welcome');

// --- PENGIRIMAN FORM CONTACT ---
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// --- PANEL ADMIN (Untuk CRUD & Update Progress Laporan) ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [PortofolioController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('portofolio', PortofolioController::class)->except(['index']);
});

// --- JALUR SAKTI TANPA TERMINAL (Udah gua keluarin dari group admin) ---
Route::get('/rakit-database', function() {
    Artisan::call('migrate:fresh');
    return "Mantap bro! Tabel udah otomatis dibuat tanpa terminal. Sekarang balik ke uts.test";
});
