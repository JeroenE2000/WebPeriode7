<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Components\DatePicker;

class MakeNewLabelTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $today = Carbon::now()->addDays(5);
            $secondDate = Carbon::now();
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
                        $browser->attribute('#labelName' , 'href')
                    )
                    ->assertPathIs('/labels/create')
                    ->press('Add')
                    ->type('#TrackingNumber' , '34567890')
                    ->type('#TrackingNumber1' , '24567890')
                    ->type('#Package_name' , 'ParapluHouder')
                    ->type('#Package_name1' , 'Pruik')
                    ->type('#Name_Sender' , 'Hendrik')
                    ->type('#Name_Sender1' , 'Piet')
                    ->type('#Address_Sender' , '5635 FA')
                    ->type('#Address_Sender1' , '5634 FG')
                    ->type('#Name_Reciever' , 'Hendrik')
                    ->type('#Name_Reciever1' , 'Piet')
                    ->type('#Address_Reciever' , '5635 FA')
                    ->type('#Address_Reciever1' , '5634 FG')
                    ->keys('#datee' , $today->day)
                    ->keys('#datee' , $today->month)
                    ->keys('#datee' , $today->year)
                    ->keys('#datee1' , $secondDate->day)
                    ->keys('#datee1' , $secondDate->month)
                    ->keys('#datee1' , $secondDate->year)
                    ->type('#Dimensions' , '8x8')
                    ->type('#Dimensions1' , '4x4')
                    ->type('#Weight' , '400')
                    ->type('#Weight1' , '200')
                    ->type('#shop_id' , '2')
                    ->type('#shop_id1' , '2')
                    ->pause(2000)
                    ->press('Submit')
                    ->pause(2000)
                    ->assertPathIs('/labels');

        });
    }
}
