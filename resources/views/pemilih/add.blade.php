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
               <form action="{{ url('pemilih/add') }}" method="post" enctype="multipart/form-data">
               	@csrf
               	<div class="row">
               	<div class="col-md-6">               		
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor registrasi</label>
                  <input type="integer" name="nip" class="form-control" id="exampleInputEmail1" value="{{ $kode }}" readonly="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="string" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Masukan nama" value="{{ old('nama') }}">
                  @if($errors->has('nama'))
                  <span class="help-block">{{$errors->first('nama')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No. Whatsapp</label>
                  <input type="integer" name="no_telp" class="form-control" id="exampleInputEmail1" placeholder="Masukan no.wa" value="{{old('no_telp')}}">
                  @if($errors->has('no_telp'))
                  <span class="help-block">{{$errors->first('no_telp')}}</span>
                  @endif
                </div>              
              </div>
              <!-- /.box-body -->
               	</div>
               	<div class="col-md-6">
               			<div class="box-body">                
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="4">{{old('alamat')}}</textarea>
                  @if($errors->has('alamat'))
                  <span class="help-block">{{$errors->first('alamat')}}</span>
                @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Photo</label>
                  <input type="file" id="exampleInputFile" name="photo">
                  <p class="help-block">Example block-level help text here.</p>
                    @if($errors->has('photo'))
                     <span class="help-block">{{$errors->first('photo')}}</span>
                    @endif
                </div>
                </div>
				<div class="box-footer">
                <button type="submit" class="btn btn-primary"> Submit</button>
              </div>
                </div>
               </div>
               </form>
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