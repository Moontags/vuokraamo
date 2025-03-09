<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuokraus extends Model
{
    use HasFactory;

    protected $table = 'vuokraus';

    protected $fillable = [
        'asiakasID',
         'tuote_id',
        'vuokrauspvm',
        'palautuspvm',
        'created_at',
        'updated_at',

    ];

    protected $dates = [
        'vuokrauspvm',
        'palautuspvm',
    ];
}
