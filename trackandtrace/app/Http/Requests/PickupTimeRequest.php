<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PickupTimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $timeCheck = mktime(15,0 ,0);
        $minusday = '+1 day';
        $format = ('Y-m-d H:i:s');
        $dateCheck = date($format , strtotime(date($format , $timeCheck).$minusday));
        return [
            'time' => 'required|after_or_equal:'.$dateCheck,
        ];
    }
}
