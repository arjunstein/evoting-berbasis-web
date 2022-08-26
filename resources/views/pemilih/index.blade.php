@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('pemilih/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-user-plus"></i> Tambah pemilih</a>
                </p>
            </div>
            <div class="box-body">
               <table class="table myTable">
                   <thead>
                       <tr>
                           <td>#</td>
                           <td width="20%">Foto</td>
                           <td width="10%">NRP</td>
                           <td width="15%">Nama</td>
                           <td width="15%">Whatsapp</td>
                           <td>Alamat</td>
                           <td>Aksi</td>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach($data as $e=>$dt)
                    <tr>
                       <td>{{ $e+1 }}</td>
                       <td><img src="{{asset($dt->photo)}}" width="100px" height="100px"></td>
                       <td>{{ $dt->nip }}</td>
                       <td>{{ $dt->nama }}</td>
                       <td>{{ $dt->no_telp }}</td>
                       <td>{{ $dt->alamat }}</td>
                       <td><p>
                           <a href="{{ url('pemilih/'.$dt->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                           <a href="{{ url('pemilih/'.$dt->id) }}" class="btn btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></a>
                       </p></td>
                    </tr>
                       @endforeach
                   </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection