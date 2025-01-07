<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuote extends Model
{
    protected $fillable = [
        'nimi',
        'kuvaus',
        'kpl',
        'painoraja',
        'kuva',
    ];

}
