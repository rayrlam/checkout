<?php

namespace Tests\Browser\Checkout;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A Dusk test Registration
     */
    public function testRegistration(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/register')
                ->assertSee('Name')
                ->assertSee('Email')
                ->assertSee('Password')
                ->assertSee('Confirm Password');           
        });
    }
}
