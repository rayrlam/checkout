<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Item;
use App\Models\Rule;
use App\Helpers\CheckoutHelper;

class TestCheckout extends TestCase
{
    // static public $checkout_tests = [
    //     [
    //         ['item_id'=>3, 'qty'=>5],
    //     ],
    //     [
    //         ['item_id'=>3, 'qty'=>4],
    //     ],
    //     [
    //         ['item_id'=>4, 'qty'=>10],
    //         ['item_id'=>1, 'qty'=>6],
    //     ],
    // ];

    public function test_checkout0_equal_88()
    {
        $sum = CheckoutHelper::cal(CheckoutHelper::$checkout_tests[0]);
        $this->assertEquals($sum , 88);
    }

    public function test_checkout1_equal_70()
    {
        $sum = CheckoutHelper::cal(CheckoutHelper::$checkout_tests[1]);
        $this->assertEquals($sum , 70);
    }

    public function test_checkout2_equal_350()
    {
        $sum = CheckoutHelper::cal(CheckoutHelper::$checkout_tests[2]);
        $this->assertEquals($sum , 350);
    }
}