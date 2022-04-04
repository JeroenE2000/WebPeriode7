<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InpakkerLoginTest extends DuskTestCase
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
                    ->type('email' , 'kees@gmail.com')
                    ->type('password' , 'password')
                    ->press('Login')
                    ->pause(2000)
                    ->assertPathIs('/home');
        });
        //assertsee voor fulltext
    }
}
