<?php

namespace Tests\Browser\Checkout;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Sleep;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A Dusk test Registration
     */
    public function test_register_has_name_email_password_confirm_password(): void
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

     /**
     * A Dusk test Registration
     */
    public function test_password_at_least_8_characters(): void
    {
        $this->browse(function (Browser $browser) {
            $name = fake()->name;
            $email = fake()->email;
            $password = substr(fake()->password, 0, 4); 

            $browser
                ->visit('/register')
                ->type('#name', $name)
                ->type('#email', $email)
                // Only input 4 characters for password 
                ->type('#password',  $password)
                ->type('#password_confirmation',  $password)
                ->press('REGISTER')
                // AssesrtSee - The password must be at least 8 characters.
                ->assertSee('8 characters');
        });
    }
}
