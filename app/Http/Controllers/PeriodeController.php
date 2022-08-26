<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
	public function index()
    {
    	$title = 'Set periode voting';
        $data = Periode::all();
    	$mulai = Periode::orderBy('tanggal','asc')->first();
    	$selesai = Periode::orderBy('tanggal','desc')->first();
    	return view('periode.index',compact('title','data','mulai','selesai'));
    }
	public function set_periode(Request $request)
    {
	   	$mulai = $request->mulai;
	    $selesai = $request->selesai;
	
	   	$tanggal1 = date('Y-m-d',strtotime($mulai));
	    $tanggal2 = date('Y-m-d',strtotime($selesai));
 		
	    //jika ingin set ulang tanggal periode
	    \DB::table('periode')->delete();

    	while ($tanggal1 <= $tanggal2) {
        $data = new Periode;
        $data->tanggal = $tanggal1;
        $data->save(); 
 
        $tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1)));
    }
    	return redirect('periode')->with('sukses','Periode voting berhasil diperbarui');
    }
}
