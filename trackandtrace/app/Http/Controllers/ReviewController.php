<?php

namespace App\Http\Controllers;

use App\Models\Parcels;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $review = Review::all();
        foreach($review as $r) {
            if($user->shop_id == $r->shop_id) {
                $data = Review::where('shop_id' , '=' , $user->shop_id)->get();
                return view('reviews.index' ,['reviews' => $data]);
            }
        }
        $data = Review::where('user_id' , '=' , $user->id)->get();
        return view('reviews.index' ,['reviews' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($packageId)
    {
        $package = Parcels::find($packageId);
        $user = Auth::user();
        return view('reviews.create', compact('user' , 'package'));
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
            'stars' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'shop_id' => 'nullable',
        ]);
        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success' , 'Review succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
