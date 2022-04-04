<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CsvImportTest extends DuskTestCase
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
            ->assertVisible('#csv')
            ->visit(
                $browser->attribute('#csv' , 'href')
            )
            ->pause(2000)
            ->attach('file', storage_path('app/public/testing/testData.csv'))
            ->pause(2000)
            ->press('Import data')
            ->pause(5000);
        });
    }
}
