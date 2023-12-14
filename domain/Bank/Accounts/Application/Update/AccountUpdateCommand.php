<?php

namespace Domain\Bank\Accounts\Application\Update;

use Domain\Shared\Domain\Bus\Command\Command;

final class AccountUpdateCommand implements Command
{
    public function __construct(
        private readonly int $id,
        private readonly ?int $owner_id,
        private readonly ?string $label,
        private readonly ?string $iban
    ) {
    }

    public static function create(
        int $id,
        ?int $owner_id = null,
        ?string $label = null,
        ?string $iban = null
    ) {
        return new self(
            $id,
            $owner_id,
            $label,
            $iban
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getOwnerId(): int|null
    {
        return $this->owner_id;
    }

    public function getLabel(): string|null
    {
        return $this->label;
    }

    public function getIban(): string|null
    {
        return $this->iban;
    }
}
