@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
  $getkode = [];
  foreach($datakategoribarang as $rows){
    $getkode[$rows->kodekategoribarang] = $rows->namakategoribarang;
  }
?>
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
  {{ Form::open(array('url' => 'savebarang')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
        <div class="col m10">
          <div class="card-panel">
            <div class="row">
              <div class="col m12"><h5>Barang Baru<a href=""><span></span></a><hr></h5></div>
            </div>
            <!-- Kode Barang -->
            <div class="row">
                <div class="col m2">Kode Barang :</div>
            </div> 
            <div class="row">
                <div class=" col m6">
                  <?php
                      $jum     = $databarang->count() + 1; 
                      $kodebrg = "B".str_pad($jum, 3, "0",STR_PAD_LEFT);
                  ?>
                  {{Form::text('txtkodebarang', $kodebrg, ['id'=>'txtkodebarang', 'readonly'=>'readonly'])}}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m2">Nama Barang :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{Form::text('txtnamabarang', '', ['id'=>'txtnamabarang', 'placeholder'=>'Gula Pasir'])}}
                </div>
            </div>
            <!-- Kategori Barang -->
            <div class="row">
                <div class="col m2">Kategori Barang :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{ Form::select('txtkodekategoribarang', $getkode, null, ['id'=>'txtkodekategoribarang', 'class'=>'validate browser-default']) }}
                </div>
            </div>
            <!-- Satuan Barang -->
            <div class="row">
                <div class="col m2">Satuan :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{Form::text('txtsatuanbarang', '', ['id'=>'txtsatuanbarang', 'placeholder'=>'Biji'])}}
                </div>
            </div>
            <!-- Stok Barang -->
            <div class="row">
                <div class="col m2">Stok :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{Form::text('txtstokbarang', '', ['id'=>'txtstokbarang', 'placeholder'=>'10'])}}
                </div>
            </div>
            <!-- Harga Barang -->
            <div class="row">
                <div class="col m2">Harga Satuan :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{Form::text('txthargabarang', '', ['id'=>'txthargabarang', 'placeholder'=>'1000'])}}
                </div>
            </div>
            <!-- Status Barang -->
            <div class="row">
                <div class="col m2">Status :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{ Form::select('txtstatusbarang', $getstatus, null, ['id'=>'txtstatusbarang', 'class'=>'validate browser-default']) }}
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="row">
                <div class=" col m6">
                  {{Form::submit('Insert',['name'=>'btninsertbarang','id'=>'btninsertbarang','class'=>'btn waves-light btn-large'])}}
                  <input  type='submit' class='waves-light btn-large' name='btncancel' id='btncancel' value='Cancel'>
                </div>
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
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr/latest/css/toastr.min.css" rel="stylesheet">
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