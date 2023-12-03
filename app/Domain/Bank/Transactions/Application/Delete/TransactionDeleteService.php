<?php

namespace Domain\Bank\Transactions\Application\Delete;

use Domain\Bank\Transactions\Domain\TransactionRepository;

class TransactionCreateService
{
    public function __construct(private readonly TransactionRepository $transactionRepository)
    {

    }

    public function __invoke(TransactionDeleteCommand $command): bool
    {
        return $this->transactionRepository->delete($command->getId());
    }
}
