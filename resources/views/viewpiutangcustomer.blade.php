@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepenjualanBJ')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                  <h5>Data Piutang Customer<a href=""><span></span></a><hr></h5>
                  <table border="1">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                  </tr>
                  @foreach($datapenjualanbj as $row)
                    @if($row->statusBJ == "TIDAK")
                    <tr>
                      <td>{{$row->nonotapenjualanBJ}}</td>
                      <td>{{$row->kodecustomer}}</td>
                      <td>{{$row->tglpembelianBJ}}</td>
                      <td>{{$row->statusBJ}}</td>
                    </tr>
                    @endif
                  @endforeach
                </table>
              </div>
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

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });
  $('.dropdown-trigger').dropdown();
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>