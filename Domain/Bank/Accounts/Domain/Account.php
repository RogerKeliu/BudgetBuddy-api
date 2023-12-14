<?php

namespace Domain\Bank\Accounts\Domain;

use Domain\Shared\Infrastructure\DomainModel;

class Account extends DomainModel
{
    private readonly int $id;

    private readonly int $owner_id;

    private readonly string $label;

    private readonly string $iban;

    public function __construct(int $id, int $owner_id, string $label, string $iban)
    {

    }

    public static function create(int $id, int $owner_id, string $label, string $iban): Script {
        return new self(
            $id,
            $owner_id,
            $label,
            $iban,
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function getOwnerId()
    {
        return $this->owner_id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getIban()
    {
        return $this->iban;
    }

    public function toArray()
    {
        return (array) $this;
    }
}
