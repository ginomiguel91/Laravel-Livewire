<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {

        return [
            'name' => ('admin'),
            'last_name' => ('admin'),
            'username' => ('admin'),
            'email' => ('admin@gmail.com'),
            'email_verified_at' => now(),
            'password' => bcrypt('12345'), // password
            'status' => ('active'),
            'dni' => ('V-12255555'),
            'remember_token' => Str::random(64),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
