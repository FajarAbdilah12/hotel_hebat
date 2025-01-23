<?php
namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $facilities = Fasilitas::all();
        return view('admin.fasilitas.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file foto
        ]);

        $data = $request->only(['nama_fasilitas', 'deskripsi']);

        // Jika ada file foto, simpan file tersebut dan tambahkan path ke data
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fasilitas', 'public');
        }

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $facility = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        $facility = Fasilitas::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file foto
        ]);

        $data = $request->only(['nama_fasilitas', 'deskripsi']);

        // Jika ada file foto baru, hapus file lama lalu simpan file baru
        if ($request->hasFile('foto')) {
            if ($facility->foto) {
                Storage::disk('public')->delete($facility->foto);
            }
            $data['foto'] = $request->file('foto')->store('fasilitas', 'public');
        }

        $facility->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $facility = Fasilitas::findOrFail($id);

        // Hapus file foto jika ada
        if ($facility->foto) {
            Storage::disk('public')->delete($facility->foto);
        }

        $facility->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}
