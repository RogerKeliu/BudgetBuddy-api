<?php

namespace Domain\Shared;

use App\Http\Controllers\Controller;
use Domain\Shared\Domain\Bus\Command\Command;
use Domain\Shared\Domain\Bus\Command\CommandBus;
use Domain\Shared\Domain\Bus\Query\Query;
use Domain\Shared\Domain\Bus\Query\QueryBus;
use Exception;

abstract class ApiController extends Controller
{
    public function __construct(
        private readonly QueryBus $queryBus,
        private readonly CommandBus $commandBus,
        Exception $exceptionHandler
    ) {
        // each(
        //     fn (int $httpCode, string $exceptionClass) => $exceptionHandler->register($exceptionClass, $httpCode),
        //     $this->exceptions()
        // );
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): array
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
