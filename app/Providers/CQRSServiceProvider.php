<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CQRS\QueryBus;
use App\CQRS\Queries\GetProductQuery;
use App\CQRS\Handlers\GetProductHandler;

class CqrsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(QueryBus::class, function ($app) {
            return new QueryBus();
        });
    }

    public function boot()
    {
        $queryBus = $this->app->make(QueryBus::class);
        $queryBus->register(GetProductQuery::class, GetProductHandler::class);
    }
}