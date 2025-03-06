<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiakas extends Model
{
    use HasFactory;

    protected $table = 'asiakas'; // Taulun nimi
    protected $primaryKey = 'id'; // Oletusavain 'id'
    public $timestamps = true; // Oletus

    protected $fillable = [
        'etunimi',
        'sukunimi',
        'sahkoposti',
        'lahiosoite',
        'postinumero',
        'postitoimipaikka',
        'puhelin',
    ];
}
