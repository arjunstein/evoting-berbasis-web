@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="/kandidat" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h2>No. urut
                            <b>: {{ $dt->no_urut }}</b>
                            </h2>
                        </center>
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-6">
                       <center>
                        <h3>Calon Ketua</h3>
                        <h3>
                           <b>{{ $dt->caketu->nama }}</b>
                       </h3>
                       <p>
                           <img src="{{ asset($dt->caketu->photo) }}" width="100px" height="100px">
                       </p>
                       </center>
                   </div>
                   <div class="col-md-6">
                       <center>
                        <h3>Calon Wakil Ketua</h3>
                       <h3>
                           <b>{{ $dt->cawaket->nama }}</b>
                       </h3>
                       <p>
                           <img src="{{ asset($dt->cawaket->photo) }}" width="100px" height="100px">
                       </p>
                       </center>
                   </div>
                   <div class="col-md-12">
                       <center>
                        <h3><b>Visi & misi</b>
                           <h4>
                            <p>
                               <b><i>
                                   {!! $dt->visi_misi !!}
                               </i></b>
                            </p>
                           </h4>
                           </h3>
                       </center>
                   </div>
               </div>
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