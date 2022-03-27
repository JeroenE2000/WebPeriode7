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
            'multiInput.*.TrackingNumber' => 'required',
            'multiInput.*.Package_name' => 'required',
            'multiInput.*.Name_Sender' => 'required',
            'multiInput.*.Address_Sender' => 'required',
            'multiInput.*.Name_Reciever' => 'required',
            'multiInput.*.Address_Reciever' => 'required',
            'multiInput.*.Date' => 'required',
            'multiInput.*.Dimensions' => 'required',
            'multiInput.*.Weight' => 'required'
        ]);
        foreach ($request->multiInput as $key => $value) {
            Labels::create($value);
        }
        return redirect()->route('labels.index')->with('success' , 'Label succesvol toegevoegd');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $label = Labels::find($id);
        return view('labels.update' , compact('label'));
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

        $label = Labels::find($id);
        $label->TrackingNumber = $request->get('TrackingNumber');
        $label->Package_name = $request->get('Package_name');
        $label->Name_Sender = $request->get('Name_Sender');
        $label->Address_Reciever = $request->get('Address_Reciever');
        $label->Name_Reciever = $request->get('Name_Reciever');
        $label->Address_Reciever = $request->get('Address_Reciever');
        $label->Date = $request->get('Date');
        $label->Dimensions = $request->get('Dimensions');
        $label->Weight = $request->get('Weight');

        $label->update();
        return redirect()->route('labels.index')->with('success' , 'Label updated');
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

        $data = Labels::search($request->search)->get();
        return view('labels.index' ,['labels' => $data]);
    }
}
