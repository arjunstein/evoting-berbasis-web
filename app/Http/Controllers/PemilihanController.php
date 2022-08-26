<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Voting;
use App\Models\M_pemilih;
use App\Models\Periode;
use Auth;

class PemilihanController extends Controller
{
    public function index()
    {
    	$title = 'Voting online';
    	$data = Kandidat::orderBy('no_urut','asc')->get();
    	return view('pemilihan.index',compact('title','data'));
    }
    public function get_visi($id)
    {
    	$dt = Kandidat::find($id);

    	return response()->json([
    		'hasil'=>$dt ]);
    }
    public function voting($id)
    {
    	$tanggal_skrg = date('Y-m-d');
    	$cek_periode = Periode::where('tanggal',$tanggal_skrg)->count();
    	if ($cek_periode > 0) {
    		$pl = M_pemilih::where('user_id',\Auth::user()->id)->first();
	    	$id_pemilih = $pl->id;
	    	$cek = Kandidat::where('calon_ketua',$id_pemilih)->orWhere('calon_wakil',$id_pemilih)->count();
	    	$user_id = $pl->user_id;
	    	$cek_pml = Voting::where('user_id',$user_id)->first();
    	if ($cek > 0) {
    		\Session::flash('gagal','Sebagai kandidat, anda tidak bisa ikut memilih');
    		return redirect()->back();

    	}elseif($cek_pml !== null) {
    		\Session::flash('gagal','Anda hanya bisa memilih 1 kali');
    		return redirect()->back();
    	}
    	else{
    		 $data = Voting::firstOrCreate(
    			['user_id'=>Auth::user()->id],
    			['kandidat_id'=>$id,'user_id'=>Auth::user()->id]);	
    		\Session::flash('sukses','Pilihan anda berhasil tersimpan');
    		return redirect('pemilihan');
    	}	    		
    	}else{
    		\Session::flash('gagal','Waktu pemilihan telah berakhir');
    		return redirect()->back();
    	}	
    }
}
