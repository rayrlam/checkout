<?php

namespace Tests\Unit\PHP;

use PHPUnit\Framework\TestCase;
use TypeError;

class PHP80FeaturesTest extends TestCase
{
    public function testNamedArguments()
    {
        $this->assertEquals('Hello, World!', $this->greet(name: 'World'));
    }

    public function test_union_types()
    {
        $this->assertIsString($this->processInput('test'));
        $this->assertIsInt($this->processInput(42));
        $this->expectException(TypeError::class);
        // Should throw TypeError
        $this->processInput([]); 
    }

    public function testMatchExpression()
    {
        $this->assertEquals('one', $this->numberToWord(1));
        $this->assertEquals('two', $this->numberToWord(2));
        $this->assertEquals('three four five', $this->numberToWord(3));
        $this->assertEquals('any', $this->numberToWord(10));
    }

    public function test_null_safe_operator()
    {
        $user = null;
        $this->assertNull($user?->name);
    
        $user = new \stdClass();
        $user->name = 'John';
        $this->assertEquals('John', $user?->name);
    }

    public function test_constructor_property_promotion()
    {
        $person = new class('John', 30) {
            public function __construct(
                public string $name,
                public int $age
            ) {}
        };

        $this->assertEquals('John', $person->name);
        $this->assertEquals(30, $person->age);
    }

    private function greet(string $name): string
    {
        return "Hello, $name!";
    }

    private function processInput(string|int $input): string|int
    {
        return $input;
    }

    private function numberToWord(int $number): string
    {
        return match ($number) {
            1 => 'one',
            2 => 'two',
            3, 4, 5 => 'three four five',
            default => 'any',
        };
    }
}