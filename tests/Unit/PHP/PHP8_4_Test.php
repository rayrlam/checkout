<?php

use PHPUnit\Framework\TestCase;

class PHP8_4_Test extends TestCase
{
    
    private function getPrivateProperty($object, $propertyName)
    {
        $reflection = new ReflectionClass(get_class($object));
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }

    public function testPropertyHooks()
    {
        $obj = new class {
            private string $name = 'John';
            
            public function __get(string $name)
            {
                return strtoupper($this->$name);
            }
            
            public function __set(string $name, $value)
            {
                $this->$name = strtolower($value);
            }
        };

        $this->assertEquals('JOHN', $obj->name);
        
        $obj->name = 'ALICE';
        $this->assertEquals('ALICE', $obj->name);
        $this->assertEquals('alice', $this->getPrivateProperty($obj, 'name'));
    }

    public function testArrayFind()
    {
        $numbers = [1, 2, 3, 4, 5];
        $result = array_find($numbers, fn($num) => $num > 3);
        $this->assertEquals(4, $result);

        $noResult = array_find($numbers, fn($num) => $num > 10);
        $this->assertNull($noResult);
    }

    public function testArrayAll()
    {
        $positiveNumbers = [1, 2, 3, 4, 5];
        $this->assertTrue(array_all($positiveNumbers, fn($num) => $num > 0));

        $mixedNumbers = [1, 2, -3, 4, 5];
        $this->assertFalse(array_all($mixedNumbers, fn($num) => $num > 0));
    }

    public function testArrayAny()
    {
        $numbers = [1, 2, 3, 4, 5];
        $this->assertTrue(array_any($numbers, fn($num) => $num > 4));
        $this->assertFalse(array_any($numbers, fn($num) => $num > 10));
    }

    public function testStandaloneTypes()
    {
        $trueFunction = function (): true {
            return true;
        };
        $falseFunction = function (): false {
            return false;
        };
        $nullFunction = function (): null {
            return null;
        };
        
        $this->assertSame(true, $trueFunction());
        $this->assertSame(false, $falseFunction());
        $this->assertNull($nullFunction());
    }

    public function testNewWithoutParenthesesChaining()
    {
        $result = new class {
            public function doSomething()
            {
                return $this;
            }
            
            public function getValue()
            {
                return 42;
            }
        }->doSomething()->getValue();

        $this->assertEquals(42, $result);
    }
}
