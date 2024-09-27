<?php

namespace Tests\Unit;

use App\Http\Controllers\Invoice\Api\V1\InvoiceV1Controller;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Http\Controllers\Invoice\Api\Invoice;

class InvoiceV1ControllerTest extends TestCase
{
    private $controller;
    private $mockRequest;
    private $mockInvoice;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->controller = new InvoiceV1Controller();
        $this->mockRequest = $this->createMock(Request::class);
        $this->mockInvoice = $this->createMock(Invoice::class);
    }

    public function testLocationId()
    {
        // Arrange
        $expectedData = ['location' => 'New York'];
        $this->mockInvoice->expects($this->once())
            ->method('data')
            ->willReturn($expectedData);

        // PHPUnit's reflection to replace the 'new Invoice()' call
        $this->setPrivateProperty($this->controller, 'invoice', $this->mockInvoice);

        // Act
        $response = $this->controller->location_id($this->mockRequest);

        // Assert
        $this->assertEquals(json_encode($expectedData), $response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetHeaders()
    {
        // Arrange
        $expectedData = ['header1' => 'value1', 'header2' => 'value2'];
        $this->mockInvoice->expects($this->once())
            ->method('data')
            ->willReturn($expectedData);

        // PHPUnit's reflection to replace the 'new Invoice()' call
        $this->setPrivateProperty($this->controller, 'invoice', $this->mockInvoice);

        // Act
        $response = $this->controller->get_headers($this->mockRequest);

        // Assert
        $this->assertEquals(json_encode($expectedData), $response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
    }

    private function setPrivateProperty($object, $propertyName, $value)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $value);
    }
}