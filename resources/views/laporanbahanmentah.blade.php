@extends('layouts.headerAdmin')
<?php
    $tempchart1['namabarang'] = [];
    $tempchart1['stok']= [];
    $idx = 0;
?>
@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savekategoribarang')) }}

    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m5">
            <div class="card-panel">
                @foreach($databarang as $rows)
                    @if($rows->kodekategoribarang != "KB001")
                        @php($tempchart1['namabarang'][$idx]    = $rows->namabarang)
                        @php($tempchart1['stok'][$idx]          = $rows->stok)
                        @php($idx++)
                    @endif
                @endforeach
                <canvas id="userChart" class="userChart">test</canvas>
            </div>
          </div>
      </div>
    </div>
  {{ Form::close() }}
  @endsection
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet"/>
  <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    chartcoba();
  });

  function chartcoba(){
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create type: 'doughnut', line, bar
        type: 'bar',
// The data for our dataset
        data: {
            labels:  {!! json_encode($tempchart1['namabarang']) !!},
            datasets: [
                {
                    label: ['Count of ages','aa'],
                    backgroundColor: ["Green","Red","Blue"] ,
                    data:  {!! json_encode($tempchart1['stok']) !!},
                },
            ]
        },
// Configuration options go here
        options: {
            scales: {
                xAxes: [{
                    barPercentage : 0.5
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 20,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
  }

  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>