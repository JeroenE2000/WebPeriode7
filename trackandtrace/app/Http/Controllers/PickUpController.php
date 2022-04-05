<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Pickup;
use App\Models\Parcels;
use Illuminate\Http\Request;
use App\Http\Requests\PickupTimeRequest;

class PickUpController extends Controller
{
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
    public function pickUpStoreAndUpdate(PickupTimeRequest $request , $packageId)
    {
        Pickup::create($request->all());
        $parcel = Parcels::find($packageId);
        $parcel->parcel_status_id = 4;
        $pickup = Pickup::latest('id')->first();
        $parcel->pickup_id = $pickup->id;
        $parcel->save();
        return redirect()->route('package.index')->with('success' , 'package bezorgtijd toegevoegd');

    }
}
