<?php

namespace App\CQRS\Handlers;

use App\CQRS\Queries\GetProductQuery;
use App\Models\Cqrs\Product;

class GetProductHandler
{
    public function handle(GetProductQuery $query)
    {
        if ($query->getId()) {
            return Product::find($query->getId());
        }
        
        return Product::all();
    }
}