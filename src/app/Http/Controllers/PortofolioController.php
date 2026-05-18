<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Menampilkan halaman publik utama (welcome) beserta data portofolio.
     */
    public function index()
    {
        // Mengambil semua data portofolio terbaru dari MariaDB
        $portofolios = Portofolio::latest()->get();         
        
        // Melempar variabel $portofolios ke file resources/views/welcome.blade.php
        return view('welcome', compact('portofolios')); 
    } 
}