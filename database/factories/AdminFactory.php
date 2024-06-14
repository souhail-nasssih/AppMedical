<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_naissance' => $this->faker->date(),
            'tele' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
            'user_id' => function () {
                return User::factory()->create(['role' => 'admin'])->id;
            },
    ];

}

}