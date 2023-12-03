<?php

namespace Database\Seeders;

use Domain\Bank\Accounts\Infrastructure\Eloquent\Account;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Account::factory(10)->create();
    }
}


