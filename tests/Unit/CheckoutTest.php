<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
// use App\Models\Checkout\Item;
// use App\Models\Checkout\Rule;
use App\Helpers\CheckoutHelper;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CheckoutTest extends TestCase
{
    use DatabaseTransactions;

    public function test_welcome_page_can_be_rendered()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_calculator_page_can_be_rendered()
    {
        $response = $this->get('/tasks/checkout/calculator');
        $response->assertStatus(200);
    }

    public function test_without_authentication()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);

        $response = $this->get('/tasks/checkout/create');
        $response->assertStatus(302);

        $response = $this->get('/tasks/checkout/createRule');
        $response->assertStatus(302);

        $response = $this->get('/tasks/checkout/itemsearch');
        $response->assertStatus(302);
    }

    public function test_requires_authentication()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $routes = [
            '/dashboard',
            '/tasks/checkout/create',
            '/tasks/checkout/createRule',
            '/tasks/checkout/itemsearch'
        ];

        foreach ($routes as $route) {
                $this->get($route)
                    ->assertStatus(200);
        }

        // $this->get('/dashboard')->assertSee('Technical Test Showcase');
    }

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