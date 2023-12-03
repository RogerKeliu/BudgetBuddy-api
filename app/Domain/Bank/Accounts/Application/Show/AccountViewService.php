<?php

namespace Domain\Bank\Accounts\Application\Show;

use Domain\Bank\Accounts\Domain\AccountRepository;

class AccountViewService
{
    public function __construct(private readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(AccountViewQuery $query): array
    {
        $accounts = $this->accountRepository->getById($query->getId());

        return $accounts;
    }
}
