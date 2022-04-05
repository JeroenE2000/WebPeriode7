<?php

namespace Tests\Unit;

use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ReviewValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /**
     * @dataProvider provideValidData
     */
    public function test_review_validation(array $data)
    {
        $request = new ReviewRequest();
        $validator = Validator::make($data, $request->rules());
        $this->assertTrue($validator->passes());
    }

    public function provideValidData()
    {
        return [
            [[
                'stars' => '3',
                'description' => 'Hele zieke service, ik vond het zo mooi. Ook de track and trace website is perfect.',
                'user_id' => '4',
                'shop_id' => '3',
            ]],
        ];
    }
}
