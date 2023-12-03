<?php

namespace Domain\Shared\Domain\Bus\Query;

interface Query
{
    public function toArray(): array;
}
