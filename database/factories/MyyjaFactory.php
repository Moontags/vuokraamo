<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class MyyjaFactory extends Factory
{
    protected $model = \App\Models\Myyja::class;

    public function definition()
    {
        return [
            'nimi' => $this->faker->name, // Myyjän koko nimi
            'kayttajatunnus' => $this->faker->unique()->userName, // Käyttäjätunnus
            'salasana' => Hash::make('salasana123'), // Oletussalasana hashattuna
            'rooli' => $this->faker->randomElement(['Kassa', 'Johtaja', 'Myynti']), // Satunnainen rooli
        ];
    }
}
