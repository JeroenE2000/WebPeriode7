<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Shops;
use Illuminate\Http\Request;

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
        if($request->input('shopID') === "Geen shop") {
            $user->shop_id = NULL;

        } else if($request->input('role') === '4') {
            return view('users.edit' , compact('user' , 'roles' , 'shops'));
        }
        else {
            $user->shop_id = $request->input('shopID');
        }

        $user->save();
        return redirect()->route('users.index')->with('success' , 'Role succesvol bijgewerkt');
    }

}
