<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        //datetime check now
        $dateNow = Carbon::now();
        $dateInput = $request->get('date');
        $substract = $dateNow->diff($dateInput);
        //substraction
        dd($substract);
        //1 day before 15:00
        $timeCheck = mktime(15,0 ,0);
        $minusday = '-1 day';
        $format = ('Y-m-d H:i:s');
        $dateCheck = date($format , strtotime(date($format , $timeCheck).$minusday));
        //this is stupid thing dont work dont look at it
        if($request->get('date') <= $dateCheck || $request->get('date') <= date('Y-m-d H:i:s') || $request->get('date') >= date('Y-m-d H:i:s')) {
            dd($dateCheck);
        }
        $request->validate([
            'date' => 'required|before:'
        ]);
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
