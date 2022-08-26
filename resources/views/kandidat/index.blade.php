@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                
                    <a href="{{ url('kandidat/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah kandidat</a>
                </p>
            </div>
            <div class="box-body">
               <table class="table myTable">
                   <thead>
                       <tr>
                           <td>No. urut</td>
                           <td>Calon Ketua</td>
                           <td>Calon Wakil</td>
                           
                           <td>Aksi</td>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach( $data as $dt )
                    <tr>
                       <td>{{ $dt->no_urut }}</td>
                       <td>{{ $dt->caketu->nama  }} - {{ $dt->caketu->nip}}</td>
                       <td>{{ $dt->cawaket->nama }} - {{ $dt->cawaket->nip}}</td>
                       <td>
                           <p>
                               <a href="{{ url('kandidat/detail/'.$dt->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                               <a href="{{ url('kandidat/'.$dt->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                               <a href="{{ url('kandidat/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus"><i class="fa fa-trash"></i></a>
                           </p>
                       </td>
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
