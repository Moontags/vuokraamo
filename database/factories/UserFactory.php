<?php

namespace Database\Factories;

use App\Models\User; // Lisää tämä rivi varmistaaksesi oikean mallin
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Määritetään, mikä malli liittyy tähän factoryyn.
     */
    protected $model = User::class;

    /**
     * Nykyinen käytössä oleva salasana.
     */
    protected static ?string $password = null;

    /**
     * Määritetään tehtaan oletustila.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), // Muutetaan fake() -> $this->faker
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Määrittää, että sähköpostiosoite ei ole vahvistettu.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
