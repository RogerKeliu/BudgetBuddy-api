<?php

namespace Domain\Bank\Transactions\Application\List;

use Domain\Bank\Transactions\Domain\TransactionRepository;

class TransactionListService
{
    public function __construct(private readonly TransactionRepository $transactionRepository)
    {

    }

    public function __invoke(TransactionListQuery $query): array
    {
        return $this->transactionRepository->all($query->toArray());
    }
}
