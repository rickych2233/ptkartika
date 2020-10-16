@extends('layouts.headerAdmin')


@section('content')
  {{ Form::open(array('url' => 'saveprosesproduksi')) }}
  <!-- INI MENU UTAMA-->
  
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                  <h5>Data Proses Produksi<a href=""><span></span></a><hr></h5>
                  <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('prosesproduksi'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Tanggal Barang Jadi</th>
                    <th>Kode Barang</th>
                    <th>Qty Hasil</th>
                    <th>ACTION</th>
                  </tr>
                  @foreach($dataprosesproduksi as $row)
                  <tr>
                    <td>{{$row->nonotaPP}}</td>
                    {{Form::hidden('txthidenonotaPP', $row->nonotaPP,['id'=>'txthidenonotaPP'])}}
                    <td>{{$row->tglPP}}</td>
                    <td>{{$row->kodebarang}}</td>
                    <td>{{$row->qtyhasilPP}}</td>
                    <td><a class="waves-effect waves-light btn modal-trigger red left" href="{!! url('updateprosesproduksi/'.$row->nonotaPP); !!}">CHECK</a></td>
                  </tr>
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