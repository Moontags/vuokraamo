<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asiakas>
 */
class AsiakasFactory extends Factory
{
    public function definition()
    {
        return [
            'etunimi' => $this->faker->firstName,
            'sukunimi' => $this->faker->lastName,
            'sahkoposti' => $this->faker->unique()->safeEmail,
            'lahiosoite' => $this->faker->streetAddress,
            'postinumero' => $this->faker->numerify('#####'),
            'postitoimipaikka' => $this->faker->city,
            'puhelin' => $this->faker->numerify('###-###-####'),

        ];
    }
}
