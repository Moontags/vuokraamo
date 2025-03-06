<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Myyja extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'myyja'; // Tietokantataulu

    protected $primaryKey = 'myyjaID'; // Ensisijainen avain

    protected $fillable = [
        'nimi',
        'kayttajatunnus',
        'salasana', // Muista, että salasana täytyy käsitellä turvallisesti!
        'rooli',
    ];

    protected $hidden = [
        'salasana', 'remember_token',
    ];

    /**
     * Palauttaa sarakkeen, jota käytetään salasana-tarkistukseen.
     */
    public function getAuthPassword()
    {
        return $this->salasana;
    }

    public $timestamps = true;
}
