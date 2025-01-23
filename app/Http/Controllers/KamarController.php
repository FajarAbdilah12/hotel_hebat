<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
     public function index()
    {
        $kamar = Kamar::all(); // Mengambil semua data kamar dari database
        return view('kamar.index', compact('kamar'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
       
    }

    public function edit(Kamar $kamar)
    {
       
    }

    public function update(Request $request, Kamar $kamar)
    {
       
    }

    public function destroy(Kamar $kamar)
    {
       
    }

    
}
