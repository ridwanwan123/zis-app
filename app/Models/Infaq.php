<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class Infaq extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }

    protected $keyType = 'string';
    public $incrementing = false;
    
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
