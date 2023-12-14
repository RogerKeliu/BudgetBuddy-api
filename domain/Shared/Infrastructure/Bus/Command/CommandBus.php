<?php

namespace Domain\Shared\Infrastructure\Bus\Command;

use Domain\Shared\Domain\Bus\Command\Command;
use Domain\Shared\Domain\Bus\Query\Query;
use Domain\Shared\Domain\Bus\Command\CommandBus as ICommandBus;
use Domain\Shared\Infrastructure\Bus\Bus;

class CommandBus extends Bus implements ICommandBus
{
    public function dispatch(Command $command): void
    {
        // Get the fully qualified class name of the query
        $commandClassName = get_class($command);

        // Extract the namespace from the fully qualified class name
        $commandNamespace = substr($commandClassName, 0, strrpos($commandClassName, '\\'));

        // Construct the handler class name by replacing "Query" with "Handler"
        $handlerClassName = class_basename($commandClassName) . 'Handler';

        // Combine the namespace and handler class name
        $handlerClass = $commandNamespace . '\\' . $handlerClassName;
        // Instantiate the handler and invoke it
        $handler = app($handlerClass);
        $handler($command);
    }
}
