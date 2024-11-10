<?php

namespace Tests\Browser\Invoice;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Sleep;
use Laravel\Dusk\Browser;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Tests\DuskTestCase;

class InvoiceTest extends DuskTestCase
{
    public function test_can_see_invoice_index(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/tasks/invoice/index')
                ->assertSee('Invoice')
                ->assertSee('Info')
                ->assertSee('Setup');  
        });
    }

    public function test_can_see_invoice_headers(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/tasks/invoice/headers')
                ->assertSee('Headers')
                ->assertSee('Range Date')
                ->assertSee('Location')  
                ->assertSee('Submit');  
        });
    }

    public function test_can_see_invoice_location(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/tasks/invoice/location')
                ->assertSee('Status')
                ->assertSee('Total')
                ->assertSee('Submit');  
        });
    }

    public function test_can_see_invoice_total(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/tasks/invoice/total')
                ->assertSee('Total')
                ->assertSee('Quantity');
        });
    }
}