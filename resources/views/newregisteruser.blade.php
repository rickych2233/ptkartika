@extends('layouts.headerAdmin')
<?php
    $getrole['ADMIN']           = "ADMIN"; 
    $getrole['SALES PENJUALAN'] = "SALES PENJUALAN"; 
    $getrole['PEGAWAI']         = "PEGAWAI"; 
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
  {{ Form::open(array('url' => 'saveregisteruser')) }}
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
      <div class="row">
              <div class="col m12"><h5>Insert Pegawai<a href=""><span></span></a><hr></h5></div>
            </div>
            <!-- Username -->
            <div class="container">
                <div class="form-group">
                    <label>Username :</label>
                    {{Form::text('txtPegawaiusername', '', ['id'=>'txtPegawaiusername','','class'=>'form-control'])}}
                </div> 
            </div>
            <!-- Email -->
            <div class="container">
                <div class="form-group">
                    <label>Email :</label>
                    {{Form::text('txtPegawaiemail', '', ['id'=>'txtPegawaiemail','','class'=>'form-control'])}}
                </div> 
            </div>
            <!-- Password -->
            <div class="container">
                <div class="form-group">
                    <label>Password :</label>
                    {{Form::password('txtPegawaipassword', ['id'=>'txtPegawaipassword','','class'=>'form-control'])}}
                </div> 
            </div>
            <!-- Nama -->
            <div class="container">
                <div class="form-group">
                    <label>Nama :</label>
                    {{Form::text('txtPegawainama', '', ['id'=>'txtPegawainama','','class'=>'form-control'])}}
                </div> 
            </div>
            <!-- Alamat -->
            <div class="container">
                <div class="form-group">
                    <label>Alamat :</label>
                    {{Form::text('txtPegawaialamat', '', ['id'=>'txtPegawaialamat','','class'=>'validate'])}}
                </div> 
            </div>
             <!-- No. Ktp -->
             <div class="container">
                <div class="form-group">
                    <label>Nomor Ktp :</label>
                    {{Form::text('txtPegawainoktp', '', ['id'=>'txtPegawainoktp','','class'=>'validate'])}}
                </div> 
            </div>
            <!-- Role -->
            <div class="container">
                <div class="form-group">
                    <label>Role Pegawai :</label>
                    {{ Form::select('txtPegawairole', $getrole, null, ['id'=>'txtPegawairole', 'class'=>'validate browser-default']) }}
                </div> 
            </div>
            <!-- Status -->
            <div class="container">
                <div class="form-group">
                    <label>Status Pegawai :</label>
                    <?php
                        $getstatus['READY']         = "READY"; 
                        $getstatus['NOT READY']     = "NOT READY"; 
                    ?>
                    {{ Form::select('txtPegawaistatus', $getstatus, null, ['id'=>'txtPegawaistatus', 'class'=>'validate browser-default']) }}
                </div> 
            </div>
            <!-- Telepon --><!-- Handphone -->
            <div class="row">
                <div class="col m3">Telepon :</div>
                <div class="col m6">Handphone :</div>
            </div>
            <div class="row">
                <div class=" col m3">
                    {{Form::text('txtPegawaitelepon', '', ['id'=>'txtPegawaitelepon','','class'=>'validate'])}}
                </div>
                <div class=" col m3">
                    {{Form::text('txtPegawaihandphone', '', ['id'=>'txtPegawaihandphone','','class'=>'validate'])}}
                </div>
            </div>
           
            <!-- Tombol Submit -->
            <div class="row">
                <div class=" col m6">
                  {{Form::submit('Insert',['name'=>'btnSignup','id'=>'btnSignup','class'=>'btn waves-light btn-large'])}}
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