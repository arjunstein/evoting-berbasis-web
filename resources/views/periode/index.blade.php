@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if($mulai == null)
                    <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-gear"> Atur periode</i>
                    </button>
                    @endif
                </p>
            </div>
            <div class="box-body">
              @if($mulai !== null)
              <form action="/periode" method="post" role="form">
                    @csrf
               <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal mulai</label>
                  <input type="text" name="mulai" class="form-control datepicker" id="exampleInputEmail1" placeholder="Masukan tanggal mulai" value="{{ date('Y-m-d',strtotime($mulai->tanggal)) }}" required="" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal berakhir</label>
                  <input type="text" name="selesai" class="form-control datepicker" id="exampleInputEmail1" placeholder="Masukan tanggal berakhir" value="{{ date('Y-m-d',strtotime($selesai->tanggal)) }}" required="" autocomplete="off">
                </div>     
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-flat btn-sm btn-primary">Simpan</button>
                        </div>
                        </form>
                      @endif
              <!-- <table class="table myTable">
                   <thead>
                       <tr>
                           <td width="5%">No</td>
                           <td>id</td>
                           <td>Tanggal</td>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach($data as $e=>$dt)
                    <tr>
                       <td>{{ $e+1 }}</td>
                       <td>{{ $dt->id }}</td>
                       <td>{{ $dt->tanggal }}</td>
                    </tr>
                       @endforeach
                   </tbody>
               </table> -->
            </div>
        </div>
    </div>
</div>
                            <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLabel">{{$title}}</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form action="/periode" method="post" role="form">
                    @csrf
               <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal mulai</label>
                  <input type="text" name="mulai" class="form-control datepicker" id="exampleInputEmail1" placeholder="Masukan tanggal mulai" required="" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal berakhir</label>
                  <input type="text" name="selesai" class="form-control datepicker" id="exampleInputEmail1" placeholder="Masukan tanggal berakhir" required="" autocomplete="off">
                </div>     
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-flat btn-sm btn-primary">Simpan</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
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