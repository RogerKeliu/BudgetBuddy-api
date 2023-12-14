<?php

namespace Domain\Bank\Accounts\Infrastructure;

use Domain\Bank\Accounts\Infrastructure\Eloquent\Account;
use Domain\Bank\Accounts\Domain\AccountRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class AccountRepositoryEloquent implements AccountRepository
{
    public function create(array $array): array|null
    {
        try {
            $account = (new Account())->fill($array);
            $account->save();

            return $account->toArray();
        } catch (Exception) {
            throw new Exception('Eloquent Duplicated Values', 401);
        }
    }

    public function all(array $array): array|null
    {
        return Account::with(['transactions'])->get()->toArray();
    }

    public function getById(int $id): array|null
    {
        $account = Account::find($id);
        if (!$account) {
            throw new Exception('error', 404);
        }
        return $account->toArray();
    }

    public function update(array $array): bool
    {
        return Account::where('id', $array['id'])->update(
            array_filter($array)
        );
    }

    public function delete(int $id): bool
    {
        return Account::find($id)->delete();
    }

    public function deleteByArray(array $ids): bool
    {
        return Account::whereIn('id', $ids)->delete();
    }

    public function destroy(int $id): bool
    {
        return Account::find($id)->forceDelete();
    }

    public function import (): array
    {
        try {
            DB::beginTransaction();

            // foreach ($data as $key => $row) {

            DB::commit();
            return [];
             // return ['saved' => $saved, 'duplicated' => $duplicated];
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return false;
        }
    }
}
