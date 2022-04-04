<?php

namespace Tests\Browser;

use Carbon\Carbon;
use App\Models\Parcels;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddDeliveryTimeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $date = Carbon::now()->addDays(5);
            $parcel = Parcels::find(1);
            $parcel->pickup_id = null;
            $parcel->save();
            $browser->visit('/login')
                    ->type('email' , 'test@gmail.com')
                    ->type('password' , 'password')
                    ->press('Login')
                    ->pause(2000)
                    ->assertPathIs('/home')
                    ->visit('/package')
                    ->assertVisible('#time1')
                    ->visit(
                        $browser->attribute('#time1' , 'href')
                    )
                    ->pause(2000)
                    ->keys('#datetimepickup', $date->day)
                    ->keys('#datetimepickup', $date->month)
                    ->keys('#datetimepickup', $date->year)
                    ->keys('#datetimepickup', ['{tab}'])
                    ->keys('#datetimepickup', $date->hour)
                    ->keys('#datetimepickup', $date->minute)
                    ->pause(2000)
                    ->press('Submit')
                    ->pause(2000);
                    ;
        });
    }
}
