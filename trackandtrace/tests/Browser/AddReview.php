<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddReview extends DuskTestCase
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
                    ->type('email' , 'jeroen@gmail.com')
                    ->type('password' , 'password')
                    ->press('Login')
                    ->visit('/package')
                    ->press('#reviewBtn1')
                    ->type('stars' , '3')
                    ->type('description' , 'Lorum testum')
                    ->press('Submit')
                    ->assertPathIs('/reviews');
        });
    }
}
