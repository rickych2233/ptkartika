@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']         = "AKTIF"; 
  $getstatus['TIDAK AKTIF']   = "TIDAK AKTIF"; 
  $gettipepembayaran['YA']      = "YA";
  $gettipepembayaran['TIDAK']   = "TIDAK";
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
  {{ Form::open(array('url' => 'savecustomer')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col m12"><h5>Customer<a href=""><span></span></a><hr></h5></div>
              </div>
            <!-- Kode Barang -->
            <div class="container">
              <div class="form-group">
                <?php
                    $jum      = $datacustomer->count() + 1; 
                    $kodejum  = "C".str_pad($jum, 3, "0",STR_PAD_LEFT);
                ?>
                <label>Kode Customer :</label>
                {{Form::text('txtkodecustomer', $kodejum, ['id'=>'txtkodecustomer', 'readonly'=>'readonly'])}}
              </div> 
            </div>
            <!-- Nama Toko -->
            <div class="container">
                <div class="form-group">
                  <label>Nama Toko:</label>
                  {{Form::text('txtnamatoko', '', ['id'=>'txtnamatoko','','class'=>'validate'])}}
                </div> 
              </div>
            <!-- Contact Person -->
            <div class="container">
              <div class="form-group">
                <label>Contact Person:</label>
                {{Form::text('txtcontactperson', '', ['id'=>'txtcontactperson','','class'=>'validate'])}}
              </div> 
            </div>
            <!-- Alamat -->
            <div class="container">
              <div class="form-group">
                <label>Alamat:</label>
                {{Form::text('txtalamat', '', ['id'=>'txtalamat','','class'=>'validate'])}}
              </div> 
            </div>
            <!-- Kota -->
            <div class="container">
              <div class="form-group">
                <label>Kota:</label>
                {{Form::text('txtkota', '', ['id'=>'txtkota','','class'=>'validate'])}}
              </div> 
            </div>
            <!-- Telepon -->
            <div class="container">
              <div class="form-group">
                <label>Ktp:</label>
                {{Form::text('txtktp', '', ['id'=>'txtktp','','class'=>'validate'])}}
              </div> 
            </div>
            <!-- HP -->
            <div class="container">
              <div class="form-group">
                <label>Hp :</label>
                {{Form::text('txthp', '', ['id'=>'txthp','','class'=>'validate'])}}
              </div> 
            </div>
            <!-- Status -->
            <div class="container">
              <div class="form-group">
                <label>Status :</label>
                {{ Form::select('txtstatus', $getstatus, null, ['id'=>'txtstatus', 'class'=>'validate browser-default']) }}
              </div> 
            </div>
            <!-- Tipe Pembayaran -->
            <div class="container">
              <div class="form-group">
                <label>Diperbolehkan Piutang :</label>
                {{ Form::select('txttipepembayaran', $gettipepembayaran, null, ['id'=>'txttipepembayaran', 'class'=>'validate browser-default']) }}
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
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet"/>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>

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