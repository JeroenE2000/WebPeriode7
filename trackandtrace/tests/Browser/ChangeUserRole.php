<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ChangeUserRole extends DuskTestCase
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
                    ->visit('/users/5/edit')
                    ->select('role','3')
                    ->press('Submit')
                    ->assertPathIs('/users');
        });
    }
}
