<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuote extends Model
{
    protected $table = 'tuote';
    protected $primaryKey = 'tuoteID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nimi',
        'kuvaus',
        'kpl',
        'hinta',
        'kuva',
        'kategoria',
    ];
}
