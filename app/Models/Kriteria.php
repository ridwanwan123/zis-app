<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['id_mustahik', 'A1','A2','A3','A4','A5','A6'];

    // public function factory()
    // {
    //     return $this->belongsTo(Factory::class, 'id_factory', 'id');
    // }

    public function mustahik()
    {
        return $this->belongsTo(Mustahik::class, 'id_mustahik');
    }
}
