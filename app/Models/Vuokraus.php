<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuokraus extends Model
{
    use HasFactory;

    protected $table = 'vuokraus'; // Taulun nimi tietokannassa

    protected $fillable = [
        'asiakasID',
        'tuote_id', // Lisää tämä vain, jos se on tarpeen
        'vuokrauspvm',
        'palautuspvm',
        'created_at',
        'updated_at',
    ];
}
