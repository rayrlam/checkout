<?php

namespace Tests\Unit\PHP;

use PHPUnit\Framework\TestCase;
use Tests\Unit\PHP\MyClass;

class PHP8_2_Test extends TestCase
{
    public function test_typed_constants()
    {
        $this->assertEquals(3.14159, MyClass::PI);
        $this->assertIsFloat(MyClass::PI);
        
        $this->assertEquals(100, MyClass::MAX_VALUE);
        $this->assertIsInt(MyClass::MAX_VALUE);
    }
}