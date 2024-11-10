<?php

namespace Tests\Browser\Category;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    public function test_clothing_link_working(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/category/index')
                ->assertSee('Category') 
                ->assertSeeLink('Clothing')
                ->assertPresent("a[href='category/1']")
                ->waitFor("a[href='category/1']")
                ->click("a[href='category/1']")
                ->assertPathIs('/tasks/category/category/1');
        });
    }  

    public function test_men_link_working(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/category/index')
                ->assertSee('Category') 
                ->assertSeeLink('Men')
                ->assertPresent("a[href='category/5']")
                ->waitFor("a[href='category/5']")
                ->click("a[href='category/5']")
                ->assertPathIs('/tasks/category/category/5');
        });
    }  

    public function test_tshirts_link_working(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/category/index')
                ->assertSee('Category') 
                ->assertSeeLink('T-Shirts')
                ->assertPresent("a[href='category/8']")
                ->waitFor("a[href='category/8']")
                ->click("a[href='category/8']")
                ->assertPathIs('/tasks/category/category/8');
        });
    }  
}