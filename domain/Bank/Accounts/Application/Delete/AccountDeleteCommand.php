<?php

namespace Domain\Bank\Accounts\Application\Delete;

use Domain\Shared\Domain\Bus\Command\Command;

final class AccountDeleteCommand implements Command
{
    public function __construct(
        private readonly array $ids
    ) {
    }

    public static function create(
        array $ids
    ) {
        return new self(
            $ids
        );
    }

    public function toArray(): array {
        return get_object_vars($this);
    }

    public function getIds(): array
    {
        return $this->ids;
    }
}
