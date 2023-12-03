<?php

namespace Database\Factories\Bank;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domain\Bank\Accounts\Infrastructure\Eloquent\Account;
use Domain\Bank\Transactions\Infrastructure\Eloquent\Transaction;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'account_id' => Account::factory(),
            'bank_type_id' => rand(1, 10),
            'description' => fake()->text(50, 100),
            'type' => fake()->text(50),
            'amount' => fake()->numberBetween(5, 300),
            'currency' => 'EUR',
            'comment' => fake()->text(50),
            'available' => true,
            'no_profit' => false,
            'creation_date' => '2022-08-03 22:02:02',
            'value_date' => '2022-08-03 22:02:02'
        ];
    }
}

