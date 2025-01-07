<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Myyja extends Authenticatable
{
    protected $table = 'myyja'; // Käytä myyja-taulua

    protected $primaryKey = 'myyjaID';

    protected $fillable = [
        'nimi',
        'kayttajatunnus',
        'salasana',
        'rooli',
    ];

    protected $hidden = [
        'salasana', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->salasana; // Laravel käyttää tätä salasana-tarkistukseen
    }

    public $timestamps = true;
}
