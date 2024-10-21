<?php

namespace App\Http\Controllers\Cqrs;

use App\Http\Controllers\Controller as BaseController;
use App\CQRS\CommandBus;
use App\CQRS\QueryBus;
use App\CQRS\Commands\CreateProductCommand;
use App\CQRS\Queries\GetProductQuery;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $commandBus;
    protected $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function store(Request $request)
    {
        $command = new CreateProductCommand($request->name, $request->price);
        $productId = $this->commandBus->dispatch($command);

        return response()->json(['id' => $productId], 201);
    }

    public function show($id)
    {
        $query = new GetProductQuery($id);
        $product = $this->queryBus->dispatch($query);

        return response()->json($product);
    }
}