<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use Illuminate\Support\Facades\Lang;
use App\Imports\LabelImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role_id !== 1) {
            $data = Labels::where('shop_id' , '=' , $user->shop_id)->get();
            return view('labels.index' ,['labels' => $data]);
        }
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
        $user = Auth::user();
        if($user->role_id !== 1) {
            $shop = $user->shop_id;
            return view('labels.create' , compact('shop'));
       }
        return view('labels.create');
    }

    public function fileImportExport() {
        return view('labels.import');
    }

    public function fileImport(Request $request) {
        Excel::import(new LabelImport, $request->file('file')->store('temp'));
        $user = Auth::user();
        if($user->role_id !== 1) {
            $data = Labels::where('shop_id' , '=' , $user->shop_id)->get();
            return view('labels.index' ,['labels' => $data]);
        }
        $data = Labels::all();
        return view('labels.index' ,['labels' => $data]);
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
            'multiInput.*.TrackingNumber' => 'required|integer',
            'multiInput.*.Package_name' => 'required|string',
            'multiInput.*.Name_Sender' => 'required|string',
            'multiInput.*.Address_Sender' => 'required|regex:/^(?:NL-)?(\d{4})\s*([A-Z]{2})$/i',
            'multiInput.*.Name_Reciever' => 'required',
            'multiInput.*.Address_Reciever' => 'required|regex:/^(?:NL-)?(\d{4})\s*([A-Z]{2})$/i',
            'multiInput.*.Date' => 'required|date',
            'multiInput.*.Dimensions' => 'required|string',
            'multiInput.*.Weight' => 'required|integer',
            'multiInput.*.shop_id' => 'required|integer',
        ]);
        foreach ($request->multiInput as $key => $value) {
            Labels::create($value);
        }
        return redirect()->route('labels.index')->with('success' , Lang::get('labels.addLabel'));
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
        return view('labels.edit' , compact('label'));
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
            'TrackingNumber' => 'required|integer',
            'Package_name' => 'required|string',
            'Name_Sender' => 'required|string',
            'Address_Sender' => 'required|regex:/^(?:NL-)?(\d{4})\s*([A-Z]{2})$/i',
            'Name_Reciever' => 'required',
            'Address_Reciever' => 'required|regex:/^(?:NL-)?(\d{4})\s*([A-Z]{2})$/i',
            'Date' => 'required|date',
            'Dimensions' => 'required|string',
            'Weight' => 'required|integer'
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
        return redirect()->route('labels.index')->with('success' , Lang::get('labels.updateLabel'));
    }

    public function search(Request $request) {
        $label = $request->input('search');
        if(empty($label)) {
            return redirect()->route('labels.index');
        }
        $user = Auth::user();
        if($user->role_id !== 1) {
            $data = Labels::search($label)->where('shop_id', $user->shop_id)->get();
            return view('labels.index' ,['labels' => $data]);
        }

        $data = Labels::search($label)->get();
        return view('labels.index' ,['labels' => $data]);
    }
}
