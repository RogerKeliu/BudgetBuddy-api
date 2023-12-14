<?php

namespace Domain\Bank\Transactions\Infrastructure\Eloquent;

use Domain\Bank\Accounts\Infrastructure\Eloquent\Account;

class TransactionObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Transaction $transaction): void
    {
        $account = Account::find($transaction->account_id);

        $updateAmount = $account->amount + $transaction->amount;
        $account->amount = $updateAmount;

        $account->save();
    }
}
