<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PdfPrintPickerTest extends DuskTestCase
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
                    ->assertPathIs('/home')
                    ->visit('/labels')
                    ->assertPathIs('/labels')
                    ->check("#checkbox1")
                    ->check("#checkbox2")
                    ->press('PdfExport')
                    ->assertPathIs('/labels');
        });
    }
}
