<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    protected $fillable = [
        'tipe_kamar',
        'deskripsi',
        'harga',
        'foto',
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }
}
