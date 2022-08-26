<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\M_pemilih;
use App\User;

class PemilihController extends Controller
{
 	public function index()
    {
    	$title = 'Daftar pemilih';
    	$data = M_pemilih::orderBy('nip', 'asc')->get();
    	
    	return view('pemilih.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah pemilih';
        $kode = M_pemilih::select('nip')->orderBy('nip', 'desc')->first();
        if( $kode != null){
            $pecah = explode("REG-", $kode->nip);
            $number = intval($pecah[1]+1);
            if($number < 10){
                $kode = "REG-00".$number;
            }else{
                $kode = "REG-0".$number;
            }
        }else{
            $kode = "REG-001";
        }
            return view('pemilih.add', compact('kode','title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nip'=>'required',
            'nama'=>'required|string|min:3|max:20',
            'no_telp'=>'required|min:10|max:14',
            'alamat'=>'required',
            'photo'=>'mimes:jpeg,png',
        ]);

    	$nip = $request->nip;
    	$nama = $request->nama;
    	$no_telp = $request->no_telp;
    	$alamat = $request->alamat;

    	$file = $request->file('photo');
    	if ($file) {
    		$nama_photo = rand().$file->getClientOriginalName();
    		$file->move('photo_pemilih', $nama_photo);
    		$photo = 'photo_pemilih/'.$nama_photo;	
    	}else{
    		$photo = '';
    	}

        //create user akun
        $usr = new User;
        $usr->name = $nama;
        $usr->email = $no_telp;
        $usr->password = bcrypt('12345');
        $usr->save();

    	$data = new M_pemilih;
        $data->user_id = $usr->id; 
    	$data->nip = $nip;
    	$data->nama = $nama;
    	$data->no_telp = $no_telp;
    	$data->alamat = $alamat;
    	$data->photo = $photo; 
    	$data->save();

    	
    	\Session::flash('sukses', 'Data berhasil ditambah');
    	return redirect('pemilih');
    }
    public function edit($id)
    {
    	$title = 'Edit data pemilih';
    	$dt = M_pemilih::find($id);
    	return view('pemilih.edit',compact('title','dt'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nip'=>'required',
            'nama'=>'required|string|min:3|max:20',
            'no_telp'=>'required|unique|min:10|max:14',
            'alamat'=>'required',
            'photo'=>'mimes:jpeg,png',
        ]);
        
    	$nip = $request->nip;
    	$nama = $request->nama;
    	$no_telp = $request->no_telp;
    	$alamat = $request->alamat;

    	$data = M_pemilih::find($id);

    	$file = $request->file('photo');
    	if ($file) {
    		$nama_photo = rand().$file->getClientOriginalName();
    		$file->move('photo_pemilih', $nama_photo);
    		$photo = 'photo_pemilih/'.$nama_photo;	
    	}else{
    		$photo = $data->photo;
    	}

        $usr = User::find($data->user_id);
        $usr->email = $no_telp;
        $usr->name = $nama;
        $usr->save();

    	$data->nip = $nip;
    	$data->nama = $nama;
    	$data->no_telp = $no_telp;
    	$data->alamat = $alamat;
    	$data->photo = $photo; 
    	$data->save();
    	
    	\Session::flash('sukses', 'Data berhasil diperbarui');
    	return redirect('pemilih');
    }
    public function delete($id)
    {
    	M_pemilih::where('id',$id)->delete();

    	\Session::flash('sukses','Data berhasil dihapus');
    	return redirect()->back();
    }
}
