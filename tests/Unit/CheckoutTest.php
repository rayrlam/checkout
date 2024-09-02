<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Checkout\Item;
use App\Models\Checkout\Rule;
use App\Helpers\CheckoutHelper;

class CheckoutTest extends TestCase
{
    public function test_welcome_page_can_be_rendered()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_calculator_page_can_be_rendered()
    {
        $response = $this->get('/calculator');
        $response->assertStatus(200);
    }

    public function test_without_authentication()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);

        $response = $this->get('/create');
        $response->assertStatus(302);

        $response = $this->get('/createRule');
        $response->assertStatus(302);

        $response = $this->get('/itemsearch');
        $response->assertStatus(302);
    }

    public function test_requires_authentication()
    {
        $user = User::factory()->create();
        $asUser = $this->actingAs($user);
 
        $response = $asUser->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Dashboard');

        $response = $asUser->get('/create');
        $response->assertStatus(200);
 
        $response =  $asUser->get('/createRule');
        $response->assertStatus(200);

        $response =  $asUser->get('/itemsearch');
        $response->assertStatus(200);
    }

    public function test_checkout0_equal_88()
    {
        // dd(CheckoutHelper::checkout(CheckoutHelper::$checkout_tests[0]));
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