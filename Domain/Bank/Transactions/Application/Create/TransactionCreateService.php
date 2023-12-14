<?php

namespace Domain\Bank\Transactions\Application\Create;

use Domain\Bank\Transactions\Domain\TransactionRepository;

class TransactionCreateService
{
    public function __construct(private readonly TransactionRepository $transactionRepository)
    {

    }

    public function __invoke(TransactionCreateCommand $query): array
    {
        return $this->transactionRepository->create($query->toArray());
    }
}
