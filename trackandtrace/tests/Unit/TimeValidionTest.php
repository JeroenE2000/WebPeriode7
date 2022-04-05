<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PickupTimeRequest;

class TimeValidionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_check_If_Pick_Up_Time_Is_Correct()
    {



        $user = User::factory()->create();

        $url = "/pickup/3/create";
        $method = 'POST';

        $request = PickupTimeRequest::create($url, $method, [
            'time' => '"2022-04-07T12:19',
        ]);

        Auth::shouldReceive('check')->once()->andReturn(true);
        Auth::shouldReceive('user')->once()->andReturn($user);

        $this->assertTrue($request->authorize());
    }
}
