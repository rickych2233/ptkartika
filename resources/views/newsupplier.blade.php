@extends('layouts.headerAdmin')
<?php
  $pembayaran['LUNAS']   = "LUNAS"; 
  $pembayaran['HUTANG']  = "HUTANG"; 
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
  {{ Form::open(array('url' => 'savesupplier')) }}
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
      <div class="row">
              <div class="col m12"><h5>New Supplier<a href=""><span></span></a><hr></h5></div>
            </div>
            <!-- Kode Supplier -->
            <div class="row">
                <div class="col m2">Kode Supplier :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    <?php
                        $jum        = $datasupplier->count() + 1; 
                        $kodejum    = "S".str_pad($jum, 3, "0",STR_PAD_LEFT);
                    ?>
                    {{Form::text('txtkodesupplier', $kodejum, ['id'=>'txtkodesupplier', 'readonly'=>'readonly'])}}
                </div>
            </div>
            <!-- Nama Supplier -->
            <div class="row">
                <div class="col m3">Nama Supplier :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtnamasupplier', '', ['id'=>'txtnamasupplier','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Nomor Handphone -->
            <div class="row">
                <div class="col m3">Nomor Handphone :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtnomorhpsupplier', '', ['id'=>'txtnomorhpsupplier','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Alamat -->
            <div class="row">
                <div class="col m3">Alamat :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtalamatsupplier', '', ['id'=>'txtalamatsupplier','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Satatus -->
            <div class="row">
                <div class="col m3">Status :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{ Form::select('txtstatussupplier', $pembayaran, null, ['id'=>'txtstatussupplier', 'class'=>'validate browser-default']) }}
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