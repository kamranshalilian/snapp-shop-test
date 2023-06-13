<?php

namespace Database\Factories;

use App\Helper\Helper;
use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cart = fake()->unique()->numberBetween(1000000000000000, 9999999999999999);
        while (!Helper::checkCartDigit($cart)) {
            $cart = fake()->unique()->numberBetween(1000000000000000, 9999999999999999);
        }
        $account = fake()->numberBetween(1, Account::count());
        return [
            "cart_number" => $cart,
            "password" => '$2y$10$FVus/MErlIW.3BD0Ygg/8uV7O37p0XTGFow6RbuEma8iJJvq4BdZK', //12345678
            "cvv" => fake()->numberBetween(100, 999),
            "user_id" => Account::find($account)?->user_id,
            "account_id" => $account,
        ];
    }
}
