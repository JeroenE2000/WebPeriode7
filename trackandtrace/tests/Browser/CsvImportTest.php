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
            ->assertPathIs('/home')
            ->visit('/labels')
            ->assertPathIs('/labels')
            ->assertVisible('#csv')
            ->visit(
                $browser->attribute('#csv' , 'href')
            )
            ->assertPathIs('/labels/import/labels')
            ->attach('file', storage_path('app/public/testing/testData.csv'))
            ->press('Import data')
            ->assertPathIs('/labels');
        });
    }
}
