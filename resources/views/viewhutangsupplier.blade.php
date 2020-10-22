@extends('layouts.headerAdmin')


@section('content')
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savetfpembelian')) }}
    <div class="main">
      <div class="row">
        <div class="col m2"></div>
          <div class="col m8">
            <div class="card-panel">
              <div class="row">
                  <h5>List hutang ke supplier<a href=""><span></span></a><hr></h5>
                <table border="1">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Nama Supplier</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Hutang</th>
                  </tr>
                  @foreach($datapenerimaanbb as $row)
                    @if($row->jenispembayaranBB == "HUTANG")
                    <tr>
                        <td>{{$row->nonotapenerimaanBB}}</td>
                        <td>{{$row->kodesupplier}}</td>
                        <td>{{$row->tglpenerimaanBB}}</td>
                        <td>{{$row->grandhargaBB}}</td>
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