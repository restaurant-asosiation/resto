<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resign;
use PDF;

class PegawaiResignController extends Controller
{
    public function Resign()
    {
    	$resign = Resign::all();
    	return view('resign',['resign'=>$resign]);
    }
 
    public function cetak_pdf()
    {
    	$resign = Resign::all();
 
    	$pdf = PDF::loadview('resign_pdf',['resign'=>$resign]);
    	return $pdf->download('laporan-resign-pdf');
}
}