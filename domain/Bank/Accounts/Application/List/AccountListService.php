<?php

namespace Domain\Bank\Accounts\Application\List;

use Domain\Bank\Accounts\Domain\AccountRepository;

class AccountListService
{
    public function __construct(private readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(AccountListQuery $query): array
    {
        $accounts = $this->accountRepository->all($query->toArray());

        return $accounts;
    }
}
