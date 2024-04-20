<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model

{
    use HasFactory;

    protected $fillable = [
        'miejsce_zaladunku',
        'data_zaladunku',
        'miejsce_docelowe',
        'data_rozladunku',
        'dystans',
        'cena',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
