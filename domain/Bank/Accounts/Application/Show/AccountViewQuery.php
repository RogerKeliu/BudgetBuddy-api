<?php

namespace Domain\Bank\Accounts\Application\Show;

use Domain\Shared\Domain\Bus\Query\Query;

final class AccountViewQuery implements Query
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
