<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua data kamar
        $rooms = Kamar::all();
        return view('admin.kamar.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        // Validasi data kamar yang diterima
        
        $request->validate([
            'tipe_kamar' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Periksa apakah ada file foto
    $fileName = null;
    if ($request->hasFile('foto')) {
        // Pindahkan file ke folder uploads
        $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
        $filePath = $request->file('foto')->move(public_path('uploads'), $fileName);

        // Debug apakah file berhasil dipindahkan
        if (!$filePath) {
            return back()->with('error', 'File tidak berhasil diupload.');
        }
    }

    // Simpan data ke database
    DB::table('kamars')->insert([
        'tipe_kamar' => $request->tipe_kamar,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'foto' => $fileName, // Simpan nama file foto
        // 'created_at' => now(),
        // 'updated_at' => now(),
    ]);

    return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
        
    
    }

    public function edit($id)
    {
        // Ambil data kamar berdasarkan ID
        $room = Kamar::findOrFail($id);
        return view('admin.kamar.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        // Ambil data kamar yang akan diupdate
        $room = Kamar::findOrFail($id);

        // Validasi data kamar yang diterima
        $request->validate([
            'tipe_kamar' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data kamar
        $room->tipe_kamar = $request->tipe_kamar;
        $room->deskripsi = $request->deskripsi;
        $room->harga = $request->harga;

        // Cek jika ada foto yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($room->foto && Storage::exists('public/uploads/' . $room->foto)) {
                Storage::delete('public/uploads/' . $room->foto);
            }

            // Simpan foto baru menggunakan Storage
            $filePath = $request->foto->store('public/uploads');
            $room->foto = basename($filePath); // Ambil nama file untuk disimpan di database
        }

        // Simpan perubahan data kamar
        $room->save();

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Ambil data kamar berdasarkan ID
        $room = Kamar::findOrFail($id);

        // Hapus foto jika ada
        if ($room->foto && Storage::exists('public/uploads/' . $room->foto)) {
            Storage::delete('public/uploads/' . $room->foto);
        }

        // Hapus data kamar
        $room->delete();

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil dihapus');
    }
}
