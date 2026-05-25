<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

// --- HALAMAN UTAMA (Membuka welcome.blade.php dengan Data) ---
Route::get('/', [PortofolioController::class, 'index'])->name('welcome');

// --- PENGIRIMAN FORM KUMPUL TUGAS ---
Route::post('/kumpul-tugas', [ContactController::class, 'storeTugas'])->name('tugas.store');

// --- PANEL ADMIN (Untuk CRUD & Update Progress Laporan) ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [PortofolioController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('portofolio', PortofolioController::class)->except(['index']);
});

// --- JALUR SAKTI KESATU: PAKSA BUAT TABEL DATABASE KOMPLIT ---
Route::get('/rakit-database', function() {
    // 1. Hapus tabel lama kalau ada biar bersih
    Schema::dropIfExists('portofolios');

    // 2. Langsung bikin tabel baru dengan kolom super komplit di sini!
    Schema::create('portofolios', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('category');
        $table->text('description');
        $table->string('image')->nullable();
        $table->string('date_day')->default('02');
        $table->string('date_month')->default('Desember');
        $table->string('date_year')->default('2005');
        $table->string('tags')->nullable();
        $table->string('project_url')->nullable();
        $table->timestamps();
    });

    return "BOOM! Tabel udah dipaksa buat dengan kolom komplit, brader. Sekarang langsung langkah kedua, akses: uts.test/isi-data-pancingan";
});

// --- JALUR SAKTI KEDUA: ISI DATA PANCINGAN ---
Route::get('/isi-data-pancingan', function() {
    \App\Models\Portofolio::create([
        'title' => 'UTS PEMWEB NYATA',
        'category' => 'WEB DESIGN',
        'description' => 'Ini data pertama web portofolio gua yang udah dinamis, gokil!',
        'date_day' => '02',
        'date_month' => 'Desember',
        'date_year' => '2005',
        'tags' => 'UI/UX, Frontend',
        'project_url' => 'https://google.com'
    ]);
    return "Data pancingan sukses masuk, brader! Langkah terakhir, langsung buka halaman utama: uts.test";
});