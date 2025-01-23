<?php
namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index()
    {
        // Menampilkan semua tipe kamar yang tersedia
        $kamars = Kamar::all();
        return view('tamu.rooms', compact('kamars'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'kamar_id' => 'required|exists:kamars,id',
        'nama_tamu' => 'required|string|max:255',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
        'jumlah_kamar' => 'required|integer|min:1',
    ]);

    // Membuat reservasi baru
    $reservasi = Reservasi::create([
        'kamar_id' => $request->kamar_id,
        'nama_tamu' => $request->nama_tamu,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'jumlah_kamar' => $request->jumlah_kamar,
    ]);

    // Redirect ke halaman cetak bukti reservasi
    return redirect()->route('tamu.print', $reservasi->id)->with('success', 'Reservasi berhasil dibuat');
}

   public function print($id)
{
    $reservation = Reservasi::with('kamar')->findOrFail($id);
    return view('tamu.print', compact('reservation'));
}
}