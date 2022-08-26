<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_pemilih;
use App\Models\Kandidat;

class KandidatController extends Controller
{
	public function index()
	{
		$title = 'Daftar kandidat';
		$data = Kandidat::orderBy('no_urut','asc')->get();
		return view('kandidat.index', compact('title','data'));
	}

	public function show($id)
	{
		$title = 'Detail kandidat';
		$dt = Kandidat::find($id);

		return view('kandidat.show',compact('title','dt'));
	}

    public function add()
    {
    	$title = 'Tambah kandidat';
    	$pemilih = M_pemilih::orderBy('nip', 'asc')->get();
        $kode = Kandidat::select('no_urut')->orderBy('no_urut', 'desc')->first();
        if( $kode != null){
            $pecah = explode("NO-", $kode->no_urut);
            $number = intval($pecah[1]+1);
            if($number < 10){
                $kode = "NO-00".$number;
            }else{
                $kode = "NO-".$number;
            }
        }else{
            $kode = "NO-001";
        }
    	return view('kandidat.add',compact('title','pemilih','kode'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'no_urut'=>'required',
        'calon_ketua'=>'required|unique:kandidat',
        'calon_wakil'=>'required|unique:kandidat',
        'visi_misi'=>'required|min:10|',
        ]);
            $data = new Kandidat;
            $data->no_urut = $request->no_urut;
            $data->calon_ketua = $request->calon_ketua;
            $data->calon_wakil = $request->calon_wakil;
            if ($request->calon_ketua == $request->calon_wakil) {
                \Session::flash('gagal','Wakil dan ketua tidak boleh orang yang sama');
            }else{
            $data->visi_misi = $request->visi_misi;     
            $data->save();

            \Session::flash('sukses', 'Data kandidat berhasil ditambahkan'); 
            return redirect('kandidat');
            }
        
    }

    public function edit($id)
    {
    	$title = 'Edit data kandidat';
    	$pemilih = M_pemilih::orderBy('nip', 'asc')->get();
    	$dt = Kandidat::find($id);
    	return view('kandidat.edit',compact('title','pemilih','dt'));
    }

    public function update(Request $request,$id)
    {
    	$data = Kandidat::find($id);
    	$data->calon_ketua = $request->calon_ketua;
    	$data->calon_wakil = $request->calon_wakil;
    	$data->visi_misi = $request->visi_misi;
    	$data->save();

    	\Session::flash('sukses', 'Data kandidat berhasil perbarui');
    	return redirect('kandidat');
    }

    public function delete($id)
    {
    	Kandidat::where('id',$id)->delete();

    	\Session::flash('sukses','Data kandidat berhasil dihapus');
    	return redirect()->back();
    }
}
