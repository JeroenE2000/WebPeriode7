<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use App\Models\Parcels;
use App\Models\Shops;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'selectedvalue' => 'required|array',
        ]);
        $data = Parcels::with('parcel_label' , 'shop' , 'parcel_status')->get()->find($request->selectedvalue);
        foreach ($request->selectedvalue as $key => $value) {
            $parcels = Parcels::where('labels_id' , '=' , $value)->first();
            if($parcels !== null) {
                $parcels->parcel_status_id = 2;
                $parcels->save();
            }
        }

        $labels = ['title'=>'PrintLabels',
        'date'=>date('d/m/y'),
        'labels'=> $data];

        $pdf = PDF::loadView('barry.index', $labels);
        return $pdf->download('PDF.pdf');
    }


}
