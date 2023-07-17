<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranDana extends Model
{
    use HasFactory;

    protected $fillable = ['id_mosque', 'id_mustahik', 'jenis_dana', 'tanggal_penyaluran', 'jumlah_penyaluran'];

    public function mosque()
    {
        return $this->belongsTo(Mosque::class, 'id_mosque');
    }

    public function mustahik()
    {
        return $this->belongsTo(Mustahik::class, 'id_mustahik');
    }
}
