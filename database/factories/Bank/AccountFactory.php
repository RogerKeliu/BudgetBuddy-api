<?php

namespace Database\Factories\Bank;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domain\Bank\Accounts\Infrastructure\Eloquent\Account;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'owner_id' => rand(1, 5),
            'label' => fake()->name(),
            'iban' => fake()->name(),
        ];
    }
}

