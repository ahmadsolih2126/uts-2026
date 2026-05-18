<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kelola Progress Laporan</title>
    <style>
        body { font-family: 'Archivo', sans-serif; background: #1a1a1a; color: #fff; padding: 40px; }
        .container { max-width: 1000px; margin: 0 auto; }
        .header-box { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #ff3366; padding-bottom: 20px; margin-bottom: 20px; }
        .btn { background: #ff3366; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px; border: none; cursor: pointer; }
        .btn-edit { background: #00bcd4; }
        .btn-delete { background: #f44336; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #262626; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #333; }
        th { background: #333; color: #ff3366; }
        .badge { padding: 5px 10px; border-radius: 4px; font-weight: bold; font-size: 12px; }
        .badge-planning { background: #ff9800; }
        .badge-progress { background: #2196f3; }
        .badge-testing { background: #9c27b0; }
        .badge-done { background: #4caf50; }
        .alert { background: #4caf50; color: white; padding: 15px; margin-bottom: 20px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-box">
            <h2>Panel Admin - Progress Laporan Project Akhir</h2>
            <a href="{{ route('admin.portofolio.create') }}" class="btn">+ Tambah Portofolio Baru</a>
        </div>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Project</th>
                    <th>Deskripsi</th>
                    <th>Status Progress Laporan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portofolios as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $item->title }}</strong></td>
                    <td>{{ Str::limit($item->description, 60) }}</td>
                    <td>
                        <span class="badge badge-{{ strtolower(str_replace(' ', '-', $item->progress)) }}">
                            {{ $item->progress }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('admin.portofolio.edit', $item->id) }}" class="btn btn-edit">Update Status</a>
                            
                            <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus project ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #aaa;">Belum ada data portofolio. Silakan tambah data baru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="margin-top: 30px;">
            <a href="{{ route('welcome') }}" style="color: #aaa; text-decoration: none;">← Kembali ke Halaman Utama Portfolio</a>
        </div>
    </div>
</body>
</html>