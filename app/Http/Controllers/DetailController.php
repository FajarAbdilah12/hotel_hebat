<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('fasilitas.index', compact('fasilitas'));
    }
}
