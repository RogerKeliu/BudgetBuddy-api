<?php

namespace Domain\Bank\Transactions\Application\Delete;

use Domain\Shared\Domain\Bus\Command\Command;

final class TransactionDeleteCommand implements Command
{
    public function __construct(private readonly int $id)
    {

    }

    public static function create(int $id)
    {
        return new self($id);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
