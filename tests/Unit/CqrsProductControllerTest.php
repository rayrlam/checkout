<?php
namespace Tests\Unit;

use App\Http\Controllers\Cqrs\ProductController;
use App\CQRS\Commands\CreateProductCommand;
use App\CQRS\Queries\GetProductQuery;
use App\CQRS\CommandBus;
use App\CQRS\QueryBus;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;

class CqrsProductControllerTest extends TestCase
{   
    protected $commandBus;
    protected $queryBus;
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var CommandBus|Mockery\MockInterface $commandBus */
        $this->commandBus = Mockery::mock(CommandBus::class);

        /** @var QueryBus|Mockery\MockInterface $queryBus */
        $this->queryBus = Mockery::mock(QueryBus::class);
        $this->controller = new ProductController($this->commandBus, $this->queryBus);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testStore()
    {
        $request = new Request([
            'name' => 'Test Product',
            'price' => 99.99
        ]);

        $this->commandBus->shouldReceive('dispatch')
            ->once()
            ->with(Mockery::type(CreateProductCommand::class))
            ->andReturn(1);

        $response = $this->controller->store($request);

        $this->assertEquals(201, $response->status());
        $this->assertEquals(['id' => 1], $response->getData(true));
    }

    public function testShow()
    {
        $productId = 1;
        $productData = ['id' => 1, 'name' => 'Test Product', 'price' => 99.99];

        $this->queryBus->shouldReceive('dispatch')
            ->once()
            ->with(Mockery::type(GetProductQuery::class))
            ->andReturn($productData);

        $response = $this->controller->show($productId);

        $this->assertEquals(200, $response->status());
        $this->assertEquals($productData, $response->getData(true));
    }
}