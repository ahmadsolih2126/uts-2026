<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Portofolio Baru</title>
    <style>
        body { font-family: 'Archivo', sans-serif; background: #1a1a1a; color: #fff; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: #262626; padding: 30px; border-radius: 8px; border-top: 4px solid #ff3366; }
        h2 { margin-top: 0; color: #ff3366; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #ccc; }
        input[type="text"], textarea, select { width: 100%; padding: 12px; background: #333; border: 1px solid #444; color: #fff; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 120px; resize: vertical; }
        .btn-container { display: flex; justify-content: space-between; align-items: center; margin-top: 30px; }
        .btn { background: #ff3366; color: white; padding: 12px 24px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px; }
        .btn-back { background: #555; text-decoration: none; padding: 12px 24px; color: white; border-radius: 4px; font-size: 14px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Portofolio Baru</h2>

        <form action="{{ route('admin.portofolio.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Judul Project</label>
                <input type="text" id="title" name="title" placeholder="Masukkan judul project" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Project / Laporan Akhir</label>
                <textarea id="description" name="description" placeholder="Jelaskan detail project lu..." required></textarea>
            </div>

            <div class="form-group">
                <label for="progress">Status Progress Awal</label>
                <select id="progress" name="progress" required>
                    <option value="Planning">Planning (Perencanaan)</option>
                    <option value="On Progress">On Progress (Pengerjaan)</option>
                    <option value="Testing">Testing (Uji Coba)</option>
                    <option value="Done">Done (Selesai Laporan)</option>
                </select>
            </div>

            <div class="btn-container">
                <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali</a>
                <button type="submit" class="btn">Tambah Proyek</button>
            </div>
        </form>
    </div>
</body>
</html>