<?php
namespace App\CQRS;

class CommandBus
{
    protected $handlers = [];

    public function register($command, $handler)
    {
        $this->handlers[get_class($command)] = $handler;
    }

    public function dispatch($command)
    {
        $handler = app()->make($this->handlers[get_class($command)]);
        return $handler->handle($command);
    }
}