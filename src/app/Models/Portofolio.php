<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    // Menghilangkan proteksi mass assignment untuk kolom form
    protected $fillable = [
        'title',
        'description',
        'progress',
        'client',
        'year',
        'role',
    ];
}