<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SkorKriteria;

class Mustahik extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mosque',
        'nama_mustahik',
        'jenis_kelamin',
        'phone',
        'address',
    ];

    public function mosque()
    {
        return $this->belongsTo(Mosque::class, 'id_mosque');
    }

    public function skor_kriteria()
    {
        return $this->hasOne(SkorKriteria::class, 'id_mustahik');
    }


}
