<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiakas extends Model
{
    use HasFactory;

    protected $table = 'asiakas';
    protected $primaryKey = 'id';
    public $timestamps = true;

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
