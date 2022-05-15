<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Item;
use App\Models\Rule;
use App\Helpers\CheckoutHelper;

class TestCheckout extends TestCase
{
    public function test_checkout0_equal_88()
    {
        $sum = CheckoutHelper::checkout(CheckoutHelper::$checkout_tests[0]);
        $this->assertEquals($sum , 88);
    }

    public function test_checkout1_equal_70()
    {
        $sum = CheckoutHelper::checkout(CheckoutHelper::$checkout_tests[1]);
        $this->assertEquals($sum , 70);
    }

    public function test_checkout2_equal_350()
    {
        $sum = CheckoutHelper::checkout(CheckoutHelper::$checkout_tests[2]);
        $this->assertEquals($sum , 350);
    }

    public function test_checkout3_equal_490()
    {
        $sum = CheckoutHelper::checkout(CheckoutHelper::$checkout_tests[3]);
        $this->assertEquals($sum , 490);
    }

    public function test_checkout4_equal_120()
    {
        $sum = CheckoutHelper::checkout(CheckoutHelper::$checkout_tests[4]);
        $this->assertEquals($sum , 120);
    }

    public function test_checkout5_equal_483()
    {
        $sum = CheckoutHelper::checkout(CheckoutHelper::$checkout_tests[5]);
        $this->assertEquals($sum , 483);
    }

}