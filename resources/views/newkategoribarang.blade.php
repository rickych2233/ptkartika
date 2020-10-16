@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
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
  {{ Form::open(array('url' => 'savekategoribarang')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
        <div class="col m8">
          <div class="card-panel">
            <div class="row">
              <div class="col m12 center"><h5>Kategori Barang Baru<a href=""><span></span></a><hr></h5></div>
            </div>
            <!-- Kode Barang -->
            <div class="row">
                <div class="col m2">Kode Kategori Barang :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    <?php
                        $jum = $datakategoribarang->count() + 1; 
                        $kodejum = "KB".str_pad($jum, 3, "0",STR_PAD_LEFT);
                    ?>
                    {{Form::text('txtkodekategoribarang', $kodejum, ['id'=>'txtkodekategoribarang', 'readonly'=>'readonly'])}}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m3">Nama Kategori Barang :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtnamakategoribarang', '', ['id'=>'txtnamakategoribarang','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Status Barang -->
            <div class="row">
                <div class="col m3">Status Kategori Barang :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{ Form::select('txtstatuskategoribarang', $getstatus, null, ['id'=>'txtstatuskategoribarang', 'class'=>'validate browser-default']) }}
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="row">
                <div class=" col m6">
                  {{Form::submit('Insert',['name'=>'btnInsert','id'=>'btnInsert','class'=>'btn waves-light btn-large'])}}
                  <input  type='submit' class='waves-light btn-large' name='btncancels' id='btncancels' value='Cancel'>
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
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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