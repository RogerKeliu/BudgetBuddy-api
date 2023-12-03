<?php

namespace Domain\Bank\Transactions\Application\Show;

use Domain\Bank\Transactions\Domain\TransactionRepository;

class TransactionViewService
{
    public function __construct(private readonly TransactionRepository $accountRepository)
    {

    }

    public function __invoke(TransactionViewQuery $query): array
    {
        return $this->accountRepository->getById($query->getId());
    }
}
