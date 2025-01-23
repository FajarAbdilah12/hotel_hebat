<?php
namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data kamar
        $kamars = Kamar::all();
        return view('tamu.dashboard', compact('kamars')); // Ganti 'kamar.index' dengan nama view Anda
    }
}