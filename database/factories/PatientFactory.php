<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Patient::class;

    public function definition()
    {
        return [
            'date_naissance' => $this->faker->date(),
            'tel' => $this->faker->phoneNumber,
            'adress' => $this->faker->address,
            'groupes_sanguins' => $this->faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']),
            'CIN' => $this->faker->unique()->numerify('C#########'),
            'user_id' => function () {
                return User::factory()->create(['role' => 'patient'])->id;
            },
        ];
    }
}