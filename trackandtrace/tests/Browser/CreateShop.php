<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateShop extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/login')
                        ->type('email' , 'test@gmail.com')
                        ->type('password' , 'password')
                        ->press('Login')
                        ->visit('/shops')
                        ->press('#shopCreateBtn')
                        ->assertPathIs('/shops/create')
                        ->type('#shopName' , 'Testshop')
                        ->type('#shopStreetname' , 'Testshoplaan')
                        ->type('#shopStreetnumber' , '404')
                        ->type('#shopPostalcode' , '4242TS')
                        ->type('#shopKVKnumber' , '01938913')
                        ->press('Submit')
                        ->assertPathIs('/shops');
            });
        });
    }
}
