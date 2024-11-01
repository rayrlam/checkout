<?php

namespace Tests\Browser\Rss;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RssTest extends DuskTestCase
{
    public function test_rss_has_index_and_rss_link(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/rss/index')
                ->assertSee('Index') 
                ->assertSee('Rss') 
                ->waitFor("a[href='/tasks/rss/rss']")
                ->click("a[href='/tasks/rss/rss']")
                ->assertPathIs('/tasks/rss/rss')
                ->waitFor("a[href='/tasks/rss/index']")
                ->click("a[href='/tasks/rss/index']")
                ->assertPathIs('/tasks/rss/index');
        });
    }  
    
    public function test_index_has_main_files_content(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/rss/index')
                ->assertSee('RssController') 
                ->assertSee('RssHelper') 
                ->assertSee('RssTest'); 
        });
    }

    public function test_rss_the_titles_of_the_table(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/rss/rss')
                ->assertSee('Name') 
                ->assertSee('Status') 
                ->assertSee('Action'); 
        });
    }
}