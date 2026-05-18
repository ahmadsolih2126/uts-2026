<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use App\Models\Portofolio;

class PortofolioSeeder extends Seeder
{
    public function run(): void
    {
        Portofolio::create([
            'title' => 'E-Commerce Platform',
            'description' => 'Developing a high-performance online store using Laravel and Vue.js with integrated payment gateways.',
            'progress' => 'On Progress',
            'client' => 'Stellar Tech',
            'year' => '2026',
            'role' => 'Lead Developer'
        ]);

        Portofolio::create([
            'title' => 'Company Profile Website',
            'description' => 'A fully responsive and modern company profile built for an international logistics agency.',
            'progress' => 'Done',
            'client' => 'FitLife Corp',
            'year' => '2025',
            'role' => 'Frontend Designer'
        ]);
    }
}