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
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
        <div class="col m10">
          <div class="card-panel">
            <div class="row">
              <div class="col m12"><h5>Insert Pegawai<a href=""><span></span></a><hr></h5></div>
            </div>
            <!-- Username -->
            <div class="row">
                <div class="col m3">Username :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtPegawaiusername', '', ['id'=>'txtPegawaiusername','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Email -->
            <div class="row">
                <div class="col m3">Email :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtPegawaiemail', '', ['id'=>'txtPegawaiemail','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Password -->
            <div class="row">
                <div class="col m3">Password :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::password('txtPegawaipassword', ['id'=>'txtPegawaipassword','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Nama -->
            <div class="row">
                <div class="col m3">Nama :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtPegawainama', '', ['id'=>'txtPegawainama','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Alamat -->
            <div class="row">
                <div class="col m3">Alamat  :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtPegawaialamat', '', ['id'=>'txtPegawaialamat','','class'=>'validate'])}}
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
            <!-- No. Ktp -->
            <div class="row">
                <div class="col m3">Nomor Ktp :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtPegawainoktp', '', ['id'=>'txtPegawainoktp','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Role -->
            <div class="row">
                <div class="col m3">Role Pegawai :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{ Form::select('txtPegawairole', $getrole, null, ['id'=>'txtPegawairole', 'class'=>'validate browser-default']) }}
                </div>
            </div>
            <!-- Status -->
            <div class="row">
                <div class="col m3">Status Pegawai :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    <?php
                        $getstatus['READY']         = "READY"; 
                        $getstatus['NOT READY']     = "NOT READY"; 
                    ?>
                    {{ Form::select('txtPegawaistatus', $getstatus, null, ['id'=>'txtPegawaistatus', 'class'=>'validate browser-default']) }}
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