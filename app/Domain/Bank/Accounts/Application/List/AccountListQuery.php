<?php

namespace Domain\Bank\Accounts\Application\List;

use Domain\Shared\Domain\Bus\Query\Query;

final class AccountListQuery implements Query
{
    public function __construct()
    {

    }

    public static function create()
    {
        return new self();
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
