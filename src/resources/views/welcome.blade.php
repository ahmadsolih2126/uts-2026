<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Dynamic Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #1e1e1e;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }
        .navbar-custom {
            background-color: #121212;
            padding: 20px 0;
        }
        .navbar-brand-custom {
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
            font-size: 24px;
        }
        .nav-link-custom {
            color: #aaaaaa;
            text-decoration: none;
            margin-left: 20px;
            font-size: 16px;
            transition: 0.3s;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: #ffffff;
            border-bottom: 2px solid #ffffff;
            padding-bottom: 5px;
        }
        .main-content {
            padding: 80px 0;
        }
        .badge-category {
            background-color: #ff2a5f;
            color: white;
            padding: 8px 16px;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .project-title {
            font-size: 64px;
            font-weight: 900;
            margin-bottom: 20px;
            font-family: 'Georgia', serif;
        }
        .project-desc {
            color: #bbbbbb;
            font-size: 18px;
            margin-bottom: 40px;
        }
        .meta-label {
            font-size: 12px;
            color: #777777;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        .meta-value {
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
        }
        .badge-tag {
            background-color: #2a2a2a;
            color: #888888;
            padding: 6px 16px;
            font-size: 14px;
            margin-right: 10px;
            display: inline-block;
        }
        .btn-view {
            background-color: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
            padding: 12px 30px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-view:hover {
            background-color: #ffffff;
            color: #1e1e1e;
        }
        .project-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 4px;
        }
        .project-wrapper {
            margin-bottom: 100px; /* Jarak antar project kalau datanya lebih dari satu */
            border-bottom: 1px solid #333333;
            padding-bottom: 60px;
        }
        .project-wrapper:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="#" class="navbar-brand-custom">
                <span style="border: 1px solid #ff2a5f; padding: 5px 10px; border-radius: 50%; margin-right: 10px; color: #ff2a5f;">Y</span>Portfolio
            </a>
            <div class="d-flex">
                <a href="#" class="nav-link-custom active">Pembuka</a>
                <a href="#" class="nav-link-custom">Tentang saya</a>
                <a href="#" class="nav-link-custom">Informasi Lanjut</a>
                <a href="#" class="nav-link-custom">Motivasi</a>
                <a href="#" class="nav-link-custom">Kumpul Tugas</a>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        
        @if($portofolios->isEmpty())
            <div class="text-center py-5">
                <h3>Belum ada data project, brader.</h3>
                <p class="text-muted">Silakan tembak jalur sakti dulu atau isi lewat admin panel.</p>
            </div>
        @else
            @foreach($portofolios as $project)
                <div class="row align-items-center project-wrapper">
                    
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        @if($project->image)
                            <img src="{{ asset('images/' . $project->image) }}" alt="Project Image" class="project-image">
                        @else
                            <div style="background-color: #2a2a2a; width: 100%; height: 400px; display: flex; align-items: center; justify-content: center; color: #555555;">
                                [ Gambar Belum Diupload ]
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 ps-lg-5">
                        <div class="badge-category">{{ $project->category }}</div>
                        <h1 class="project-title">{{ $project->title }}</h1>
                        <p class="project-desc">{{ $project->description }}</p>

                        <div class="row mb-4">
                            <div class="col-4">
                                <div class="meta-label">Date</div>
                                <div class="meta-value">{{ $project->date_day }}</div>
                            </div>
                            <div class="col-4">
                                <div class="meta-label">Month</div>
                                <div class="meta-value">{{ $project->date_month }}</div>
                            </div>
                            <div class="col-4">
                                <div class="meta-label">Year</div>
                                <div class="meta-value">{{ $project->date_year }}</div>
                            </div>
                        </div>

                        <div class="mb-5">
                            @if($project->tags)
                                @foreach(explode(',', $project->tags) as $tag)
                                    <span class="badge-tag">{{ trim($tag) }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div>
                            <a href="{{ $project->project_url ?? '#' }}" target="_blank" class="btn-view">View Project →</a>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>