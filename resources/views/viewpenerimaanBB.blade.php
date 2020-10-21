@extends('layouts.headerAdmin')
<?php
  $tempchart1 = [];
  $idx = 0;
  $tempchart1['namabarangDPBB'] = [];
  $tempchart1['qtypenerimaanBB']= [];
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepenerimaanBB')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                  <h5>Penerimaan Bahan Baku<a href=""><span></span></a><hr></h5>
                  <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newpenerimaanBB'); !!}"><i class="large material-icons">add</i></a>
                  <table border="1">
                    <tr>
                      <th>Nomor Nota</th>
                      <th>Tanggal Penerimaan</th>
                      <th>Status Penerimaan</th>
                      <th>Jenis Penerimaan</th>
                      <th>ACTION</th>
                    </tr>
                    @foreach($datapenerimaanbb as $row)
                    <tr>
                      <td>{{$row->nonotapenerimaanBB}}</td>
                      <td>{{$row->tglpenerimaanBB}}</td>
                      <td>{{$row->statuspenerimaanBB}}</td>
                      <td>{{$row->jenispembayaranBB}}</td>
                      <td><a class="waves-effect waves-light btn modal-trigger red left" href="{!! url('updateBB/'.$row->nonotapenerimaanBB); !!}">CHECK</a></td>
                    </tr>
                    @endforeach
                  </table>
              </div>
            </div>
          </div>
      </div>
    </div>
    @foreach($datadetailpenerimaan as $rows)
      @php($tempchart1['namabarangDPBB'][$idx] = $rows->namabarangDPBB)
      @php($tempchart1['qtypenerimaanBB'][$idx] = $rows->qtypenerimaanBB)
      @php($idx++)
    @endforeach
    <canvas id="userChart" class="userChart">test</canvas>
  {{ Form::close() }}
  @endsection
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet"/>
  <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    chartcoba();
  });

  function chartcoba(){
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
// The data for our dataset
        data: {
            labels:  {!! json_encode($tempchart1['namabarangDPBB']) !!},
            datasets: [
                {
                    label: ['Count of ages','aa'],
                    backgroundColor: ["Green","Red","Blue"] ,
                    data:  {!! json_encode($tempchart1['qtypenerimaanBB']) !!},
                },
            ]
        },
// Configuration options go here
        options: {
            scales: {
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
                    boxWidth: 25,
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
  $('.dropdown-trigger').dropdown();
  

  function updatedata(kode,nama){
    $('#txtupkodekategoribarang').val(kode);
    $('#txtupnamakategoribarang').val(nama);
  }

  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>


<script>
    
</script>