<?php

namespace Domain\Bank\Accounts\Application\Create;

use Domain\Shared\Domain\Bus\Command\Command;

final class AccountCreateCommand implements Command
{
    public function __construct(
        private readonly int $owner_id,
        private readonly string $label,
        private readonly string $iban
    ) {
    }

    public static function create(
        int $owner_id,
        string $label,
        string $iban
    ) {
        return new self(
            $owner_id,
            $label,
            $iban
        );
    }

    public function toArray(): array {
        return get_object_vars($this);
    }

    public function getOwnerId(): int
    {
        return $this->owner_id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getIban(): string
    {
        return $this->iban;
    }
}
