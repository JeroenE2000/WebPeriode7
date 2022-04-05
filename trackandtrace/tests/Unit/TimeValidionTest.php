<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Faker\Factory;
use Tests\TestCase;
use App\Http\Requests\PickupTimeRequest;
use Illuminate\Support\Facades\Validator;

class TimeValidionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_should_contain_all_the_expected_validation_rules()
    {
        $request = new PickupTimeRequest();

        $timeCheck = mktime(15,0 ,0);
        $minusday = '+1 day';
        $format = ('Y-m-d H:i:s');
        $dateCheck = date($format , strtotime(date($format , $timeCheck).$minusday));
        $this->assertEquals([
            'time' => 'required|after_or_equal:'.$dateCheck,
        ], $request->rules());
    }

    /**
     * @dataProvider provideinValidData
     */
    public function test_should_contain_invalid_pickuptime(array $data)
    {
        $request = new PickupTimeRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->passes());
    }

    public function provideinValidData()
    {
        return [
            [[
                'time' => now(),
            ]],
        ];
    }
 /**
     * @dataProvider provideValidData
     */
    public function test_should_contain_valid_pickup(array $data)
    {
        $request = new PickupTimeRequest();
        $validator = Validator::make($data, $request->rules());
        $this->assertTrue($validator->passes());
    }

    public function provideValidData()
    {
        $date = Carbon::now()->addDays(3);
        return [
            [[
                'time' => $date,
            ]],
        ];
    }
}
