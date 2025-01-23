<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{


     public function __construct()
    {
        $this->middleware('auth'); // Pastikan pengguna harus login
    }
    public function index()
    {
        $reservasis = Reservasi::with('kamar')->get();
        return view('resepsionis.dashboard', compact('reservasis'));
    }

    public function create()
    {
        $kamars = Kamar::all();
        return view('reservasi.create', compact('kamars'));
    }

       public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id',
            'nama_tamu' => 'required|string|max:255',
            'tanggal_check_in' => 'required|date',
            'jumlah_kamar' => 'required|integer|min:1',
        ]);

        Reservasi::create([
            'kamar_id' => $request->kamar_id,
            'nama_tamu' => $request->nama_tamu,
            'tanggal_check_in' => $request->tanggal_check_in,
            'jumlah_kamar' => $request->jumlah_kamar,
        ]);

        return redirect()->route('resepsionis.dashboard')->with('success', 'Reservasi berhasil dibuat.');
    }

    public function print($id)
    {
        $reservasi = Reservasi::with('kamar')->findOrFail($id);
        return view('reservasi.print', compact('reservasi'));
    }
}