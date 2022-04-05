<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdministratorLoginTest extends DuskTestCase
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
                    ->assertPathIs('/home');
        });
    }
}
