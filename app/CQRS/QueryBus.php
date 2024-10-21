<?php

namespace App\CQRS;

use InvalidArgumentException;

class QueryBus
{
    protected $handlers = [];

    public function register(string $queryClass, string $handlerClass)
    {
        if (!class_exists($queryClass)) {
            throw new InvalidArgumentException("Query class {$queryClass} does not exist.");
        }

        if (!class_exists($handlerClass)) {
            throw new InvalidArgumentException("Handler class {$handlerClass} does not exist.");
        }

        $this->handlers[$queryClass] = $handlerClass;
    }

    public function dispatch(object $query)
    {
        $queryClass = get_class($query);

        if (!isset($this->handlers[$queryClass])) {
            throw new InvalidArgumentException("No handler registered for query " . $queryClass);
        }

        $handlerClass = $this->handlers[$queryClass];
        $handler = app()->make($handlerClass);

        if (!method_exists($handler, 'handle')) {
            throw new InvalidArgumentException("Handler {$handlerClass} does not have a handle method.");
        }

        return $handler->handle($query);
    }
}