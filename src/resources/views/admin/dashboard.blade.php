<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            background-color: #1e1e1e;
            min-height: 100vh;
            border-right: 1px solid #2d2d2d;
        }
        .sidebar .nav-link {
            color: #aaaaaa;
            padding: 15px 20px;
            font-weight: 500;
            transition: 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #ffffff;
            background-color: #2a2a2a;
            border-left: 4px solid #ff2a5f;
        }
        .main-content {
            padding: 40px;
        }
        .card-custom {
            background-color: #1e1e1e;
            border: 1px solid #2d2d2d;
            border-radius: 8px;
        }
        .table-custom {
            color: #ffffff;
            border-color: #2d2d2d;
        }
        .table-custom th {
            background-color: #2a2a2a;
            color: #ffffff;
            border-bottom: 2px solid #2d2d2d;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        .table-custom td {
            background-color: #1e1e1e;
            color: #cccccc;
            vertical-align: middle;
            border-bottom: 1px solid #2d2d2d;
        }
        .btn-pink {
            background-color: #ff2a5f;
            color: white;
            font-weight: bold;
            transition: 0.3s;
            border: none;
        }
        .btn-pink:hover {
            background-color: #e02454;
            color: white;
        }
        .modal-custom {
            background-color: #1e1e1e;
            color: #ffffff;
            border: 1px solid #2d2d2d;
        }
        .form-control-custom {
            background-color: #121212;
            border: 1px solid #2d2d2d;
            color: #ffffff;
        }
        .form-control-custom:focus {
            background-color: #151515;
            border-color: #ff2a5f;
            color: #ffffff;
            box-shadow: none;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-3 col-lg-2 px-0 sidebar d-none d-md-block">
                <div class="p-4 border-bottom border-secondary mb-3">
                    <h4 class="text-white mb-0"><span class="text-danger">Y</span>-Admin</h4>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#"><i class="fas fa-project-diagram me-2"></i> Portofolio</a>
                    <a class="nav-link" href="{{ url('/') }}" target="_blank"><i class="fas fa-globe me-2"></i> Lihat Web</a>
                </nav>
            </div>

            <div class="col-md-9 col-lg-10 main-content">
                
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="fw-bold mb-1">Manajemen Portofolio</h2>
                        <p class="text-muted mb-0">Ubah isi halaman pembuka web lu secara *real-time* di sini.</p>
                    </div>
                    <button class="btn btn-pink px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalTambahProject">
                        <i class="fas fa-plus me-2"></i> Tambah Project Baru
                    </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success bg-success text-white border-0 shadow-sm mb-4">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="card card-custom shadow">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-custom mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-4">Judul Project</th>
                                        <th>Kategori Atas</th>
                                        <th>Tanggal Rilis</th>
                                        <th>Tags Bawah</th>
                                        <th class="text-center pe-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($portofolios->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center py-5 text-muted">
                                                <i class="fas fa-folder-open fa-3x mb-3"></i>
                                                <br>Belum ada data di database, brader. Klik tombol tambah di atas!
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($portofolios as $project)
                                            <tr>
                                                <td class="fw-bold ps-4" style="font-size: 16px;">{{ $project->title }}</td>
                                                <td><span class="badge" style="background-color: #ff2a5f;">{{ $project->category }}</span></td>
                                                <td>{{ $project->date_day }} {{ $project->date_month }} {{ $project->date_year }}</td>
                                                <td><small class="text-muted">{{ $project->tags ?? '-' }}</small></td>
                                                <td class="text-center pe-4">
                                                    <form action="{{ route('admin.portofolio.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus project ini dari web utama, brad?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger px-3">
                                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahProject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.portofolio.store') }}" method="POST" class="modal-content modal-custom shadow-lg">
                @csrf
                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold text-white"><i class="fas fa-folder-plus me-2 text-danger"></i> Input Karya Portofolio Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted fw-bold">Judul Project</label>
                            <input type="text" name="title" class="form-control form-control-custom" required placeholder="Contoh: UTS PEMWEB NYATA">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted fw-bold">Kategori Atas</label>
                            <input type="text" name="category" class="form-control form-control-custom" required placeholder="Contoh: WEB DESIGN">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold">Deskripsi Singkat / Bio</label>
                        <textarea name="description" rows="3" class="form-control form-control-custom" required placeholder="Contoh: Anything about me..."></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-4">
                            <label class="form-label text-muted fw-bold">Tanggal (Hari)</label>
                            <input type="text" name="date_day" class="form-control form-control-custom" value="02" required>
                        </div>
                        <div class="col-4">
                            <label class="form-label text-muted fw-bold">Bulan</label>
                            <input type="text" name="date_month" class="form-control form-control-custom" value="Desember" required>
                        </div>
                        <div class="col-4">
                            <label class="form-label text-muted fw-bold">Tahun</label>
                            <input type="text" name="date_year" class="form-control form-control-custom" value="2005" required>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted fw-bold">Tags Kategori Bawah (Pisah Koma)</label>
                            <input type="text" name="tags" class="form-control form-control-custom" placeholder="Contoh: UI/UX, Frontend">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted fw-bold">Link Project URL</label>
                            <input type="url" name="project_url" class="form-control form-control-custom" placeholder="https://google.com">
                        </div>
                    </div>

                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-pink px-4">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>