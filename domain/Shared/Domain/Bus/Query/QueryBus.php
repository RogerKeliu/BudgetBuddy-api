<?php

namespace Domain\Shared\Domain\Bus\Query;

interface QueryBus
{
    public function ask(Query $query): array;
}
