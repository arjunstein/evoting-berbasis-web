@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="/kandidat" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-angle-left"></i> Back</a>
                </p>
            </div>
            <div class="box-body">
                <form role="form" action="{{ url('kandidat/'.$dt->id) }}" method="post">
                @csrf
                {{method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No. urut kandidat</label>
                  <input type="text" name="no_urut" class="form-control" value="{{ $dt->no_urut }}" id="exampleInputEmail1" readonly="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Calon Ketua</label>
                  <select class="form-control select2" name="calon_ketua">
                      @foreach($pemilih as $pml)
                      <option value="{{ $pml->id }}" {{ $dt->calon_ketua == $pml->id ? 'selected' : ''}}>{{ $pml->nama }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Calon Wakil Ketua</label>
                  <select class="form-control select2" name="calon_wakil">
                      @foreach($pemilih as $pml)
                      <option value="{{ $pml->id }}" {{ $dt->calon_wakil == $pml->id ? 'selected' : ''}}>{{ $pml->nama }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Visi & Misi</label>
                  <textarea class="form-control summernote" name="visi_misi" rows="2" required="">{{$dt->visi_misi}}</textarea>
                </div>
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-rocket"> Perbarui</i></button>
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
 
@endsection
