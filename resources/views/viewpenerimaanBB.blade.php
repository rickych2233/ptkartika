@extends('layouts.headerAdmin')



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
                  </tr>
                  @foreach($datapenerimaanbb as $row)
                  <tr>
                    <td>{{$row->nonotapenerimaanBB}}</td>
                    <td>{{$row->tglpenerimaanBB}}</td>
                    <td>{{$row->statuspenerimaanBB}}</td>
                    <td>{{$row->jenispembayaranBB}}</td>
                    <!-- <td>{{Form::submit('Edit',['name'=>'btnEditbarang','id'=>'btnEditbarang','class'=>'btn waves-light btn-medium red'])}}</td> -->
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