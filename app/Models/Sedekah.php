<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sedekah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mosque',
        'nama_donatur',
        'phone',
        'nominal',
        'status'
    ];

    public function mosque()
    {
        return $this->belongsTo(Mosque::class, 'id_mosque', 'id');
    }
}
