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

    /**
     * A Dusk test Registration 'A' x 3, get total 130
     */
    public function test_3a_checkout_get_130(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/checkout/calculator')
                    ->type('items[1]', 3)
                    ->press('button[type="submit"]')
                    ->assertSee('130');
        });
    }

    /**
     * A Dusk test Registration 'B' x 2, get total 45
     */
    public function test_2a_checkout_get_45(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/checkout/calculator')
                    ->type('items[2]', 2)
                    ->press('button[type="submit"]')
                    ->assertSee('45');
        });
    }

    /**
     * A Dusk test Registration 'C' x 2, get total 38
     */
    public function test_2c_checkout_get_38(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/checkout/calculator')
                    ->type('items[3]', 2)
                    ->press('button[type="submit"]')
                    ->assertSee('38');
        });
    }

    /**
     * A Dusk test Registration 'C' x 3, get total 50
     */
    public function test_3c_checkout_get_50(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/checkout/calculator')
                    ->type('items[3]', 3)
                    ->press('button[type="submit"]')
                    ->assertSee('50');
        });
    }

    /**
     * A Dusk test Registration total get 5 if purchased with an ‘A’
     */
    public function test_d_checkout_with_3a_get_135(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/checkout/calculator')
                    ->type('items[1]', 3)
                    ->type('items[4]', 1)
                    ->press('button[type="submit"]')
                    ->assertSee('135');
        });
    }
}
