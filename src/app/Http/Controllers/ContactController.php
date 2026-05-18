<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function storeTugas(Request $request)
    {
        // 1. Validasi Input & File (Maksimal file 10MB)
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'file_tugas' => 'required|mimes:pdf,doc,docx|max:10240', 
        ]);

        // 2. Proses Upload File
        if ($request->hasFile('file_tugas')) {
            $file = $request->file('file_tugas');
            
            // Bikin nama file unik formatnya: Tugas_Nama_Waktu.pdf
            $namaFile = 'Tugas_' . str_replace(' ', '_', $request->name) . '_' . time() . '.' . $file->getClientOriginalExtension();
            
            // Pindahkan file langsung ke folder public/dokumen yang sudah lu rapihin
            $file->move(public_path('dokumen'), $namaFile);

            return redirect()->back()->with('success', 'Wih mantap, tugas lu berhasil dikumpulkan secara dinamis, bro!');
        }

        return redirect()->back()->with('error', 'Aduh, filenya gagal ke-upload nih.');
    }
}