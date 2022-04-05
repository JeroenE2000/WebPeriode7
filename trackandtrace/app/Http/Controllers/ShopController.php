<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shops::all();
        return view('shops.index' ,['shops' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'streetname' => 'required',
            'streetnumber' => 'required',
            'postalcode' => 'required',
            'KVKnumber' => 'required',
        ]);
        Shops::create($request->all());

        return redirect()->route('shops.index')->with('success' , 'Shop succesvol toegevoegd');
    }
}
