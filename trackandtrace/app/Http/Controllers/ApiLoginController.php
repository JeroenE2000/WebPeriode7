<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return $this->response($success, 'Success login');
        } else {
            return $this->sendError('Unauthorised.' , ['error' => 'Unauthorised']);
        }
    }
}
