<?php

namespace Tests\Browser\Quotation;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class QuotationTest extends DuskTestCase
{
    public function test_has_quotation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/quotation/index')
                ->assertSee('Quotation') 
                ->assertSee('What we are looking for')
                ->assertSee('Setup');  
        });
    }  
}