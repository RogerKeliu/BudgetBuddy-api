<?php

namespace Domain\Bank\Accounts\Application\Destroy;

use Domain\Bank\Accounts\Domain\AccountRepository;

class AccountDestroyService
{
    public function __construct(private readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(AccountDestroyCommand $query): bool
    {
        $this->accountRepository->destroy($query->getId());

        return true;
    }
}
