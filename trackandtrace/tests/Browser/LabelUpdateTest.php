<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LabelUpdateTest extends DuskTestCase
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
                    ->pause(2000)
                    ->assertPathIs('/home')
                    ->visit('/labels')
                    ->assertPathIs('/labels')
                    ->assertVisible('#labelName')
                    ->visit(
                        $browser->attribute('#update1' , 'href')
                    )
                    ->assertPathIs('/labels/1/edit')
                    ->type('Address_Sender' , '5634 FF')
                    ->type('Address_Reciever' , '2344 AH')
                    ->press('Submit')
                    ->assertPathIs('/labels');
        });
    }
}
