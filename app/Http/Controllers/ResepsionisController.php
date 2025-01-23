<?php
namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    public function index()
    {
        // Menampilkan semua reservasi
        $reservasi = Reservasi::all();
        return view('resepsionis.index', compact('reservasi'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date',
        ]);

        // Filtering berdasarkan tanggal check-in
        $reservasi = Reservasi::whereDate('check_in', $request->check_in)->get();
        return view('resepsionis.index', compact('reservasi'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
        ]);

        // Pencarian berdasarkan nama tamu
        $reservasi = Reservasi::where('nama_tamu', 'like', '%' . $request->nama_tamu . '%')->get();
        return view('resepsionis.index', compact('reservasi'));
    }
}