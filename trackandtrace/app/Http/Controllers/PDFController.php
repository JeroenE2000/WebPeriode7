<?php

namespace App\Http\Controllers;

use App\Models\Labels;
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
        $data = Labels::find(array_keys($request->selectedvalue));
        $labels = ['title'=>'PrintLabels',
        'date'=>date('d/m/y'),
        'labels'=> $data];

        $pdf = PDF::loadView('barry.index', $labels);
        return $pdf->download('PDF.pdf');
    }

   
}
