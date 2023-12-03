<?php

namespace Database\Seeders;

use Domain\Bank\Accounts\Infrastructure\Eloquent\Account;
use Domain\Bank\Transactions\Infrastructure\Eloquent\Transaction;
use Illuminate\Database\Seeder;

class BankTransactionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $accounts = Account::all()->slice(0 ,5);
        foreach($accounts as $account) {
            Transaction::factory([
                'account_id' => $account->id
            ])->count(10)->create();

        }
    }
}


