<?php

namespace Domain\Bank\Transactions\Application\Update;

use Domain\Bank\Transactions\Domain\TransactionRepository;

class TransactionUpdateService
{
    public function __construct(private readonly TransactionRepository $transactionRepository)
    {

    }

    public function __invoke(TransactionUpdateQuery $query): array
    {
        die;
        // return $this->transactionRepository->update($query->toArray());
    }
}
