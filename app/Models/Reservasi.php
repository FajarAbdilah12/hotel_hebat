<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

      protected $fillable = ['kamar_id', 'nama_tamu', 'check_in', 'check_out', 'jumlah_kamar'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
