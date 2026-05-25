<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';

    // Daftarkan semua kolom database agar bisa diisi lewat form admin
    protected $fillable = [
        'title', 
        'category', 
        'description', 
        'image', 
        'date_day', 
        'date_month', 
        'date_year', 
        'tags', 
        'project_url'
    ];
}