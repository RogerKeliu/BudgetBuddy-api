<?php

namespace Domain\Bank\Accounts\Application\Update;

use Domain\Bank\Accounts\Domain\AccountRepository;

class AccountUpdateService
{
    public function __construct(private readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(AccountUpdateCommand $command): bool
    {
        $this->accountRepository->update($command->toArray());

        return true;
    }
}
