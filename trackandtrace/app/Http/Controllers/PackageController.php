<?php

namespace App\Http\Controllers;

use App\Imports\ParcelImport;
use App\Models\Parcels;
use App\Models\Labels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PackageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->role_id !== 1 && $user->role_id !== 4) {
            $packages = Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->where('shop_id', '=' , $user->shop_id)->sortable()->paginate(5);
            return view('parcels.index' , compact('packages'));
        } else if($user->role_id === 4) {
            $packages = Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->where('receiver_id', '=' , $user->id)->sortable()->paginate(5);
            return view('parcels.index' , compact('packages'));
        }
        $packages = Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->sortable()->paginate(5);

        return view('parcels.index' , compact('packages'));
    }

    public function fileImportExport() {
        return view('parcels.import');
    }

    public function fileImport(Request $request) {
        Excel::import(new ParcelImport, $request->file('file')->store('temp'));
        $user = Auth::user();
        if($user->role_id !== 1) {
            $data = Parcels::where('shop_id' , '=' , $user->shop_id)->get();
            return view('parcels.index' ,['parcels' => $data]);
        }
        $data = Parcels::all();
        return view('parcels.index' ,['packages' => $data]);
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

    public function search(){
        return view('parcels.search');
    }

    public function status(Request $request)
    {
        $label = Labels::where('TrackingNumber', '=', $request->input('TrackingNumber'))->get();
        if($label !== null){
            foreach($label as $l) {
                $parcel = Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->where('label_id', '=', $l->id)->get();
                if($parcel !== null) {
                    return view('parcels.show', compact('parcel'));
                }
            }
            return view('parcels.search');
        }
        return view('parcels.search');
    }
    /**
     * All api functions
     */
    public function apiIndex()
    {
        $user = Auth::user();
        if($user->role_id !== 1) {
            $packages = Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->where('shop_id', '=' , $user->shop_id)->get();
            return $packages;
        }
        return Parcels::with('parcel_label' , 'shop' , 'parcel_status' , 'receiver')->get();
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
            'receiver_id' => 'required|integer',
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
