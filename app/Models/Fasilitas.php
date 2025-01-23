<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_fasilitas', 'deskripsi', 'foto'];

    /**
     * Relasi ke model Kamar
     * Fasilitas dimiliki oleh satu kamar
     */
}
