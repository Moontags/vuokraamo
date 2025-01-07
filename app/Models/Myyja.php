<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Myyja extends Authenticatable
{
    // Määritetään taulun nimi
    protected $table = 'myyja';

    // Määritetään ensisijainen avain
    protected $primaryKey = 'myyjaID';

    // Sallitaan mass assignable kentät
    protected $fillable = [
        'nimi',
        'kayttajatunnus',
        'salasana',
        'rooli',
    ];

    protected $hidden = [
        'salasana', 'remember_token',
    ];

    // Korvaa oletussalasana-attribuutin nimi
    public function getAuthPassword()
    {
        return $this->salasana;
    }
}
