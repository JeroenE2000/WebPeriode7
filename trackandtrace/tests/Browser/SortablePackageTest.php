<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SortablePackageTest extends DuskTestCase
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
                    ->visit('/package')
                    ->visit('/package?sort=deliveryservice&direction=asc')
                    ->visit('/package?sort=parcel_label.Package_name&direction=asc')
                    ->visit('/package?sort=parcel_label.Name_sender&direction=asc')
                    ->visit('/package?sort=shop.name&direction=asc')
                    ->visit('/package?sort=parcel_status.state&direction=asc')
                    ->visit('/package?sort=receiver.name&direction=asc')
                    ->visit('/package')
                    ->assertPathIs('/package');
        });
    }
}
