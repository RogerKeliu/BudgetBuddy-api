<?php

namespace Domain\Bank\Accounts\Application\Delete;

use Domain\Bank\Accounts\Application\Delete\AccountDeleteCommand;
use Domain\Bank\Accounts\Domain\AccountRepository;

class AccountDeleteService
{
    public function __construct(private readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(AccountDeleteCommand $query): bool
    {
        $this->accountRepository->delete($query->getId());

        return true;
    }
}
