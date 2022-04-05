<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateUser extends DuskTestCase
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
                    ->visit('/users/create')
                    ->type('name' , 'password')
                    ->type('email' , 'password@gmail.com')
                    ->type('password' , 'password')
                    ->type('password_confirmation' , 'password')
                    ->select('role_id','3')
                    ->select('shop_id','3')
                    ->press('Submit')
                    ->assertPathIs('/users');
        });
    }
}
