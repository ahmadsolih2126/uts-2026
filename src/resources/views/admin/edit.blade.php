<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Progress Laporan</title>
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
        <h2>Update Status Progress Laporan</h2>
        <p style="color: #aaa; margin-bottom: 25px;">Ubah progress pengerjaan untuk proyek: <strong>{{ $portofolio->title }}</strong></p>

        <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul Project</label>
                <input type="text" id="title" name="title" value="{{ $portofolio->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Project</label>
                <textarea id="description" name="description" required>{{ $portofolio->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="progress">Status Progress Laporan</label>
                <select id="progress" name="progress" required>
                    <option value="Planning" {{ $portofolio->progress == 'Planning' ? 'selected' : '' }}>Planning (Perencanaan)</option>
                    <option value="On Progress" {{ $portofolio->progress == 'On Progress' ? 'selected' : '' }}>On Progress (Pengerjaan)</option>
                    <option value="Testing" {{ $portofolio->progress == 'Testing' ? 'selected' : '' }}>Testing (Uji Coba)</option>
                    <option value="Done" {{ $portofolio->progress == 'Done' ? 'selected' : '' }}>Done (Selesai Laporan)</option>
                </select>
            </div>

            <div class="btn-container">
                <a href="{{ route('admin.dashboard') }}" class="btn-back">Batal</a>
                <button type="submit" class="btn">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>