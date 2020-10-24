@extends('layouts.headerAdmin')


@section('content')
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepengirimanbarang')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                  <h5>Data List Pengiriman<a href=""><span></span></a><hr></h5>
                  <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newpengiriman'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Sales Penjualan</th>
                    <th>Kode Customer</th>
                    <th>Action</th>
                  </tr>
                  @foreach($datapengirimanbarang as $row)
                  <tr>
                    <td>{{$row->nonotapengirimanB}}</td>
                    <td>{{$row->tglpengirimanB}}</td>
                    <td>{{$row->username}}</td>
                    <td>{{$row->kodecustomer}}</td>
                    <td>
                    <a class="waves-effect waves-light btn modal-trigger yellow darken-1 left" href="{!! url('updatepengirimanbarang/'.$row->nonotapengirimanB); !!}">UPDATE</a>
                    {{ Form::submit('DETAIL',['name'=>'btndetail','id'=>'btndetail','class'=>'btn waves-light btn-medium red']) }}
                    </td>
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
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>