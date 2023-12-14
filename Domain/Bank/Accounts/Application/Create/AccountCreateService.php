<?php

namespace Domain\Bank\Accounts\Application\Create;

use Domain\Bank\Accounts\Domain\AccountRepository;
use Domain\Scripts\Domain\Account;

class AccountCreateService
{
    public function __construct(private readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(AccountCreateCommand $query)
    {
        $this->accountRepository->create($query->toArray());
    }
}
