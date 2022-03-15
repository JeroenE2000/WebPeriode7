<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Labels;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Labels::all();
        return view('labels.index' ,['labels' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labels.create');
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
            'TrackingNumber' => 'required',
            'Package_name' => 'required',
            'Name_Sender' => 'required',
            'Address_Sender' => 'required',
            'Name_Reciever' => 'required',
            'Address_Reciever' => 'required',
            'Date' => 'required',
            'Dimensions' => 'required',
            'Weight' => 'required'
        ]);

        Labels::create($request->all());
        return redirect()->route('labels.index')->with('success' , 'Label succesvol toegevoegd');
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

    public function search(Request $request) {
        $label = $request->input('search');
        if(empty($label)) {
            return redirect()->route('labels.index');
        }
        $data = Labels::whereRaw(
            "MATCH(Name_Sender)AGAINST(?)" , array($label));
        return view('labels.index' ,['labels' => $data]);
    }
}
