<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use App\Models\Parcels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->role_id !== 1) {
            $packages = Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->get();
            return view('parcels.index' , compact('packages'));
        }
        $packages = Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->where('shop_id', '=' , $user->shop_id)->get();
        return view('parcels.index' , compact('packages'));
    }

    public function create()
    {
        return view('parcels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deliveryservice' => 'required|string',
            'label_id' => 'required|integer',
            'shop_id' => 'required|integer',
            'parcel_status_id' => 'required|integer',
            'receiver_id' => 'required|integer',
        ]);
        $parcels = Parcels::all();
        foreach ($parcels as $key => $value) {
            if($value->labels_id == $request->input('labels_id')) {
                return response("Label is al gekoppeld aan pakket", 403);
            }
        }

        return Parcels::create($request->all());
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    /**
     * All api functions
     */
    public function apiIndex()
    {
        return Parcels::all();
    }

    public function apiShow($id)
    {
        return Parcels::find($id);
    }

    public function apiUpdate(Request $request, $id)
    {
        $request->validate([
            'deliveryservice' => 'required|string',
            'labels_id' => 'required|integer',
            'shop_id' => 'required|integer',
            'parcel_status_id' => 'required|integer',
        ]);
        $package = Parcels::find($id);
        $package->update($request->all());
        return $package;
    }

    public function apiDestroy($id)
    {
        Parcels::destroy($id);
        return Parcels::all();
    }
}
