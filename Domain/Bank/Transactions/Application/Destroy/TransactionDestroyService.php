<?php

namespace Domain\Bank\Transactions\Application\Destroy;

use Domain\Bank\Transactions\Domain\TransactionRepository;

class TransactionDestroyService
{
    public function __construct(private readonly TransactionRepository $transactionRepository)
    {

    }

    public function __invoke(TransactionDestroyCommand $command): bool
    {
        return $this->transactionRepository->destroy($command->getId());
    }
}
