<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index' , compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $shops = Shops::all();
        return view('users.edit' , compact('user' , 'roles' , 'shops'));
    }

    public function create()
    {
        $roles = Role::all();
        $shops = Shops::all();
        return view('users.create' , compact('roles' , 'shops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $roles = Role::all();
        $shops = Shops::all();
        $shop_id = null;
        if($request->input('shopID') === "null") {
            $shop_id = NULL;
        } else if($request->input('role') === '4') {
            return view('users.create' , compact('roles' , 'shops'));
        }
        else {
            $shop_id = $request->input('shop_id');
        }
        if($request->input('role_id') === "null") {
            return view('users.create' , compact('roles' , 'shops'));
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
            'shop_id' =>  $shop_id
        ]);

        return redirect()->route('users.index')->with('success' , 'user is added');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|integer',
        ]);
        $user = User::find($id);
        $roles = Role::all();
        $shops = Shops::all();
        if($request->input('role') === "Selecteer een role") {
            return view('users.edit' , compact('user' , 'roles' , 'shops'));
        }
        $user->role_id = $request->input('role');
        if($request->input('shopID') === "null") {
            $user->shop_id = NULL;

        } else if($request->input('role') === '4') {
            return view('users.edit' , compact('user' , 'roles' , 'shops'));
        }
        else {
            $user->shop_id = $request->input('shopID');
        }
        if($request->input('role_id') === "null") {
            return view('users.edit' , compact('user' , 'roles' , 'shops'));
        }

        $user->save();
        return redirect()->route('users.index')->with('success' , 'Role succesvol bijgewerkt');
    }

}
