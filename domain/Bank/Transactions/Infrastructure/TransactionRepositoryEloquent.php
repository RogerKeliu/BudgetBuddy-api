<?php

namespace Domain\Bank\Transactions\Infrastructure;

use Domain\Bank\Transactions\Infrastructure\Eloquent\Transaction;
use Domain\Bank\Transactions\Domain\TransactionRepository;

class TransactionRepositoryEloquent implements TransactionRepository
{
    public function create(array $array): array|null
    {
        $transaction = (new Transaction())->fill($array);
        $transaction->save();

        return $transaction->toArray();
    }

    public function all(array $array): array|null
    {
        return Transaction::get()->toArray();
    }

    public function getById(int $id): array|null
    {
        return Transaction::find($id)->toArray();
    }

    public function update(array $array): bool
    {
        return Transaction::where('id', $array['id'])->update(
            array_filter($array)
        );
    }

    public function delete(int $id): bool
    {
        return Transaction::find($id)->delete();
    }

    public function destroy(int $id): bool
    {
        return Transaction::find($id)->forceDelete();
    }
}
