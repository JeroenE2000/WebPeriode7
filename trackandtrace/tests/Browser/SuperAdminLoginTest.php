<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SuperAdminLoginTest extends DuskTestCase
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
                    ->type('email' , 'test@gmail.com')
                    ->type('password' , 'password')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
