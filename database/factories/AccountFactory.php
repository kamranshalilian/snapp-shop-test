<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "account_number" => fake()->unique()->numberBetween(100000000, 9999999999),
            "amount" => fake()->unique()->numberBetween(1000, 900000000),
            "user_id" => fake()->numberBetween(1, User::count()),
        ];
    }
}
