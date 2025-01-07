<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myyja extends Model
{
    use HasFactory;

    protected $table = 'myyja'; // Tietokantataulun nimi
    protected $fillable = [
        'nimi',
        'kayttajatunnus',
        'salasana',
        'rooli',
    ];

    protected $hidden = [
        'salasana',
    ];
}
