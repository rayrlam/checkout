<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\CreateProductCommand;
use App\Models\Cqrs\Product;

class CreateProductHandler
{
    public function handle(CreateProductCommand $command): int
    {
        $product = Product::create([
            'name' => $command->name,
            'price' => $command->price
        ]);

        return $product->id;
    }
}