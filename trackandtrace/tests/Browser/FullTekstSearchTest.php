<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FullTekstSearchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email' , 'piet@gmail.com')
                    ->type('password' , 'password')
                    ->press('Login')
                    ->pause(2000)
                    ->assertPathIs('/home')
                    ->visit('/labels')
                    ->assertPathIs('/labels')
                    ->type('search' , 'Paraplustok')
                    ->press('Search')
                    ->pause(2000)
                    ->assertsee('Paraplustok')
                    ->pause(2000)
                    ->assertPathIs('/labels/search');
        });
    }
}
