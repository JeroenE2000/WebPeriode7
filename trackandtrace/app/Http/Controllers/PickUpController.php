<?php

namespace App\Http\Controllers;

use App\Models\Parcels;
use App\Models\Pickup;
use DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PickUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($packageId)
    {
        return view('pickup.create' , compact('packageId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pickUpStoreAndUpdate(Request $request , $packageId)
    {
        $timeCheck = mktime(15,0 ,0);
        $minusday = '+1 day';
        $format = ('Y-m-d H:i:s');
        $dateCheck = date($format , strtotime(date($format , $timeCheck).$minusday));
        $request->validate([
            'time' => 'required|after_or_equal:'.$dateCheck,
        ]);
        Pickup::create($request->all());
        $parcel = Parcels::find($packageId);
        $parcel->parcel_status_id = 4;
        $pickup = Pickup::latest('id')->first();
        $parcel->pickup_id = $pickup->id;
        $parcel->save();
        return redirect()->route('package.index')->with('success' , 'package bezorgtijd toegevoegd');

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
}
