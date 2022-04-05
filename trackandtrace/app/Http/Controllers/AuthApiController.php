<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthApiController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role_id' => 4
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $respone = [
            'user' => $user,
            'token' => $token
        ];
        return response($respone, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'logout'
        ];
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Check email
        $user = User::where('email' , $fields['email'])->first();
        if(!$user || !Hash::check($fields['password'] , $user->password)) {
            return response([
                'message' => 'Bad credentails'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;

        $respone = [
            'user' => $user,
            'token' => $token
        ];
        return response([
            'message' => 'Succesvolle login',
            'Data' => $respone
        ], 201);
    }
}
