<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_pemilih;
use App\Models\kandidat;
use App\Models\Voting;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class BerandaController extends Controller
{

    public function index()
    {
    	$title = 'Halaman beranda';
        $pml = M_pemilih::orderBy('nip','asc')->get();
    	$data = Voting::orderBy('id', 'asc')->get(); 
        $hasil = [];
        $kandidat = Kandidat::get();
        foreach ($kandidat as $key => $kd) {
            $id_kandidat = $kd->id;
            $no_urut = $kd->no_urut;
            $total = Voting::where('kandidat_id',$id_kandidat)->count();

            $a['name'] = $no_urut;
            $a['y'] = $total;
            array_push($hasil, $a);
        }
        
    	return view('beranda.index', compact('title','data','kandidat','hasil','pml'));
    }
    
    public function change_password()
    {
    	$title = 'Ubah password';
    	return view('beranda.ubah-password',compact('title'));
    }
    public function store(Request $request)
    {
			 if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
			 \Session::flash('gagal','Password yang anda masukan salah');
            return redirect()->back();
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            \Session::flash("gagal","Password baru tidak boleh sama dengan password lama, silahkan pilih yang lain.");
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        \Session::flash("sukses","Password berhasil diubah");
        return redirect('beranda');

    }
}
