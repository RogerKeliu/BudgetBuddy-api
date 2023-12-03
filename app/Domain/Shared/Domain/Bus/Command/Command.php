<?php

declare(strict_types=1);

namespace Domain\Shared\Domain\Bus\Command;

interface Command
{
    public function toArray(): array;
}
