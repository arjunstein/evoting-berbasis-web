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
                <p><h4>Selamat datang di E-voting <b>{{ Auth::user()->name }}</b></h4></p>
            </div>
            <div class="box-body">
            	<div class="row">
        <div class="col-lg-4 col-sm-2">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$kandidat->count()}}</h3>

              <p>Kandidat</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="/pemilihan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-sm-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$pml->count()}}</h3>

              <p>Jumlah pemilih</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-sm-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$data->count()}}</h3>

              <p>Suara masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="" class="small-box-footer"> <i class="fa fa-arrow-circle-down"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-8">
                         <div style="margin-bottom: 35px;">
                    <div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
                </div>
                    </div>
                    <div class="col-md-4">
                      <table class="table">
                          @foreach($hasil as $hs)
                          <tr>
                              <th>Urut {{$hs['name']}}</th>
                              <th>:</th>
                              <th>{{ $hs['y'] }}</th>
                          </tr>
                          @endforeach
                      </table>  
                    </div>
      </div>
            </div>
        </div>
    </div>
</div>
    <!-- Button trigger modal -->

@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
      Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Perolehan suara pemilihan ketua & wakil RT Graha Asri 2020-2025'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: {!! json_encode($hasil) !!}
            }]
        });
      $('.alert').alert()
        // btn refresh

        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection
