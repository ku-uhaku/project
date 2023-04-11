<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsersFactory extends Factory
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
            'email' => $this->faker->safeEmail,
            "phone" => $this->faker->phoneNumber,
            'password' => $this->faker->password,
            'type' => $this->faker->randomElement(['admin', 'instructor', 'student']),
            'image' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
            'create_at' =>  $this->faker->dateTimeBetween('-1 years', 'now'),
            'update_at' =>  $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
