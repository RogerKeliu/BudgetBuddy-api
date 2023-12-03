<?php

namespace Domain\Bank\Accounts\Application\Delete;

use Domain\Shared\Domain\Bus\Command\Command;

final class AccountDeleteCommand implements Command
{
    public function __construct(
        private readonly int $id
    ) {
    }

    public static function create(
        int $id
    ) {
        return new self(
            $id
        );
    }

    public function toArray(): array {
        return get_object_vars($this);
    }

    public function getId(): int
    {
        return $this->id;
    }
}
