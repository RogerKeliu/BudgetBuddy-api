<?php

namespace Domain\Bank\Transactions\Application\Update;

use Domain\Shared\Domain\Bus\Query\Query;

final class TransactionUpdateQuery implements Query
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
