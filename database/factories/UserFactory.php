<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'birthdate' => $this->faker->date,
            'password' => bcrypt('password'),
            'type' => 'student',
            'image' => null,
            'bywho' => $this->faker->randomElement([1, 2]),
            'is_active' => $this->faker->randomElement([1, 0]),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
