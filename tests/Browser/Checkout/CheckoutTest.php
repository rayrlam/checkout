<?php

namespace Tests\Browser\Checkout;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Sleep;
use Laravel\Dusk\Browser;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Tests\DuskTestCase;

class CheckoutTest extends DuskTestCase
{
    /**
     * A Dusk test Registration has name, email, password & confirm passowrd 
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
     * A Dusk test Registration password at least 8 characters
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

     /**
     * A Dusk test Registration user can login and see dashboard
     */
    public function test_user_can_login_and_see_dashboard(): void
    {
        $name = fake()->name;
        $email = fake()->email;
        $password = substr(fake()->password, 0, 8); 

        User::factory()->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password), 
        ]);
 
        $this->browse(function (Browser $browser) use ($email, $password) {
            $browser->visit('/login')
                    ->type('email', $email)
                    ->type('password', $password)
                    ->press('button[type="submit"]')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard')
                    ->assertSee('Create Item')
                    ->assertSee('Create Rule');
        });
    }
}
