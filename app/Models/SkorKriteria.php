<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mustahik;
use App\Models\Kriteria;

class SkorKriteria extends Model
{
    use HasFactory;

    protected $fillable = ['id_mustahik', 'id_kriteria', 'id_factory', 'NR', 'NH', 'NK', 'HA    '];

    // Definisikan relasi dengan model Factory
    public function factory()
    {
        return $this->belongsTo(Factory::class, 'id_factory');
    }

    // Definisikan relasi dengan model Kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    // Definisikan relasi dengan model Mustahik
    public function mustahik()
    {
        return $this->belongsTo(Mustahik::class, 'id_mustahik');
    }
}
