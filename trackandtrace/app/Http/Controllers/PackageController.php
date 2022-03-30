<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use App\Models\Parcels;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $package = Parcels::find(1);
        $test = $package->parcel_label;
        dd($test);
    }

    public function store(Request $request)
    {

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

    public function apiStore(Request $request)
    {
        return Parcels::create($request->all());
    }

    public function apiShow($id)
    {
        return Parcels::find($id);
    }

    public function apiUpdate(Request $request, $id)
    {
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
