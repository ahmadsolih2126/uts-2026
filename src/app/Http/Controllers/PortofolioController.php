<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    // 1. Menampilkan Halaman Depan Publik (welcome.blade.php)
    public function index()
    {
        $portofolios = Portofolio::latest()->get(); 
        return view('welcome', compact('portofolios')); 
    } 

    // 2. Menampilkan Halaman Dashboard Admin
    public function adminDashboard()
    {
        $portofolios = Portofolio::latest()->get();
        return view('admin.dashboard', compact('portofolios')); // Membuka folder views/admin/dashboard.blade.php
    }

    // 3. Menampilkan Form Tambah Project Baru
    public function create()
    {
        return view('admin.create'); // Membuka folder views/admin/create.blade.php
    }

    // 4. Menyimpan Data Project Baru dari Form ke Database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Logika upload foto/gambar ke dalam folder storage
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portofolios', 'public');
            $data['image'] = $imagePath;
        }

        Portofolio::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Project Portofolio berhasil ditambahkan!');
    }

    // 5. Menampilkan Form Edit Project
    public function edit($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('admin.edit', compact('portofolio'));
    }

    // 6. Memperbarui Data Project yang Diedit
    public function update(Request $request, $id)
    {
        $portofolio = Portofolio::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada gambar baru yang diupload
            if ($portofolio->image) {
                Storage::disk('public')->delete($portofolio->image);
            }
            $imagePath = $request->file('image')->store('portofolios', 'public');
            $data['image'] = $imagePath;
        }

        $portofolio->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Project Portofolio berhasil diupdate!');
    }

    // 7. Menghapus Project
    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        if ($portofolio->image) {
            Storage::disk('public')->delete($portofolio->image);
        }
        $portofolio->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Project Portofolio berhasil dihapus!');
    }
}