<?php

namespace Database\Factories;

use App\Models\Medecin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medecin>
 */
class MedecinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Medecin::class;

    public function definition()
    {
        return [
            'tel' => $this->faker->phoneNumber,
            'adress' => $this->faker->address,
            'N_professionel' => $this->faker->unique()->numerify('N###'),
            'specialite' => $this->faker->randomElement(['Cardiologie', 'Pédiatrie', 'Dermatologie']),
            'verification' => false, // Définir à false par défaut
            'user_id' => function () {
                return User::factory()->create(['role' => 'medecin'])->id;
            },
        ];
    }
}
