<?php

namespace Domain\Shared\Infrastructure\Bus\Query;

use Domain\Shared\Domain\Bus\Query\Query;
use Domain\Shared\Domain\Bus\Query\QueryBus as IQueryBus;
use Domain\Shared\Infrastructure\Bus\Bus;

class QueryBus extends Bus implements IQueryBus
{
    public function ask(Query $query): array
    {
        // Get the fully qualified class name of the query
        $queryClassName = get_class($query);

        // Extract the namespace from the fully qualified class name
        $queryNamespace = substr($queryClassName, 0, strrpos($queryClassName, '\\'));

        // Construct the handler class name by replacing "Query" with "Handler"
        $handlerClassName = class_basename($queryClassName) . 'Handler';

        // Combine the namespace and handler class name
        $handlerClass = $queryNamespace . '\\' . $handlerClassName;
        // Instantiate the handler and invoke it
        $handler = app($handlerClass);
        $result = $handler($query);

        return $result;
    }
}
