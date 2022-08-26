@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
                <center><h4><b>Pemilihan Ketua & Wakil RT Graha Asri 2020-2025</b></h4></center>
                @foreach ($data as $dt)
               <div class="row">
                <center>
                    <h3>
                        <b>{{ $dt->no_urut }}</b>
                    </h3>
                    <p>
                        <button url="{{ url('pemilihan/get-visi/'.$dt->id) }}" class="btn btn-flat btn-md btn-success btn-visi"><i class="fa fa-book"></i></button>
                        
                        <a href="{{ url('pemilihan/vote/'.$dt->id) }}" id="pilih" class="btn btn-flat btn-md btn-danger" onclick="return confirm('Yakin dengan pilihan anda?')"><i class="fa fa-pencil"></i></a>
                    </p>
                </center>
                               <div class="col-md-6">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-blue">
                          <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset($dt->caketu->photo) }}" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username"><strong>{{ $dt->caketu->nama }}</strong></h3>
                          <h5 class="widget-user-desc"><strong>Calon Ketua</strong></h5>
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>Nama <span class="pull-right badge bg-blue">{{$dt->caketu->nama}}</span></a></li>
                            <li><a>No. HP <span class="pull-right badge bg-aqua">{{$dt->caketu->no_telp}}</span></a></li>
                            <li><a>Alamat <span class="pull-right badge bg-green">{{$dt->caketu->alamat}}</span></a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>

                    <div class="col-md-6">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-green">
                          <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset($dt->cawaket->photo) }}" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username"><strong>{{ $dt->cawaket->nama }}</strong></h3>
                          <h5 class="widget-user-desc"><strong>Calon Wakil Ketua</strong></h5>
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>Nama <span class="pull-right badge bg-blue">{{$dt->cawaket->nama}}</span></a></li>
                            <li><a>No. HP <span class="pull-right badge bg-aqua">{{$dt->cawaket->no_telp}}</span></a></li>
                            <li><a>Alamat <span class="pull-right badge bg-green">{{$dt->cawaket->alamat}}</span></a></li>
                            </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>
               </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
    <!-- modal visi -->
        <div class = "modal fade" id = "modal-visi" role = "dialog">
    <div class = "modal-dialog modal-lg">
     <div class = "modal-content">
      <div class = "modal-header">      
       <button type = "button" class="close" data-dismiss = "modal">×</button>
       <h4 class = "modal-title">Visi misi</h4>
     </div>
     <div class = "modal-body">
       
     </div>
     <div class = "modal-footer">
       <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Close</button>
     </div>
   </div>
 </div>
</div>
@endsection

@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
        //btn visi
        $('.btn-visi').click(function(e){
            e.preventDefault();
            $('#modal-visi').find('.modal-body').empty();
            var url = $(this).attr('url');

            $.ajax({
                type:'get',
                dataType:'json',
                url:url,
                success:function(data) {
                    console.log(data);
                    $('#modal-visi').find('.modal-body').html(data.hasil.visi_misi);
                $('#modal-visi').modal();    
                }
            })
            
        })
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>

@endsection