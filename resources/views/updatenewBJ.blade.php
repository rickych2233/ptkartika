@extends('layouts.headerAdmin')


@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <?php
        if($error == ""){
          Alert::success('Success Title', 'Success Message');
        }else{
          Alert::error('Error Message', $error);
        }
      ?>
    @endforeach
    </ul>
  </div>
@endif
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepenjualanBJ')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                <div class="row">
                    <div class="col m12"><h5>List Pembelian Bahan Baku<a href=""><span></span></a><hr></h5></div>
                </div>
                <table border="1">
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @if(session()->get("nonotapenjualanBJtemp"))
                    @php($cart = session()->get("nonotapenjualanBJtemp"))
                @endif
                @foreach($databarang as $row)
                  <tr>
                  @if($row->kodekategoribarang == "KB001")
                    <td>{{$row->kodebarang}}</td>
                    {{Form::hidden('txtupnonotaDBJ', $row->kodebarang,['id'=>'txtupnonotaDBJ'])}}
                    <td>{{$row->namabarang}}</td>
                    {{Form::hidden('txtupnamabarangDBJ', $row->namabarang,['id'=>'txtupnamabarangDBJ'])}}
                    <td>{{$row->satuan}}</td>
                    {{Form::hidden('txtupsatuaanDBJ', $row->satuan,['id'=>'txtupsatuaanDBJ'])}}
                    <td>{{$row->harga}}</td>
                    {{Form::hidden('txtuphargaDBJ', $row->harga,['id'=>'txtuphargaDBJ'])}}
                    <td>{{$row->status}}</td>
                    {{Form::hidden('txtupstatusDBJ', $row->status,['id'=>'txtupstatusDBJ'])}}
                    <td>{{Form::submit('CHECK',['name'=>'btnsimpanBJ','id'=>'btnsimpanHH','class'=>'btn waves-light btn-medium'])}}</td>
                  @endif
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
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr/latest/css/toastr.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>

  //Materialize
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });
  //$('.dropdown-trigger').dropdown();
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>