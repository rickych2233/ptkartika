@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']      = "AKTIF"; 
  $getstatus['TIDAK AKTIF']    = "TIDAK AKTIF"; 
?>
@section('content')
{{ Form::open(array('url' => 'savesupplier')) }}
  <!-- modal -->
  <div id="modal_update" class="modal" style='border-radius:2px;width:40%'>
            <h3 class='rounded-font center white-text red lighten-3' style="padding-top:2%;padding-bottom:3%">Update Kategori Barang</h3>
            <!--<hr class='center' style='border: 1px solid white;margin-top:-3.7%'>-->
            <div class="row">
              <div class="row">
                  <div class="col m6">Kode Supplier :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupkodesupplier', '', ['id'=>'txtupkodesupplier','','class'=>'validate','readonly'=>'readonly'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Nama Supplier :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupnamasupplier', '', ['id'=>'txtupnamasupplier','','class'=>'validate'])}}
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="row">
                  <div class="col m6">Handphone :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtuphp', '', ['id'=>'txtuphp','','class'=>'validate'])}}
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="row">
                  <div class="col m6">Alamat :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupalamat', '', ['id'=>'txtupalamat','','class'=>'validate'])}}
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="row">
                  <div class="col m6">Status :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{ Form::select('txtupstatus', $getstatus, null, ['id'=>'txtupstatus', 'class'=>'validate browser-default']) }}
                  </div>
              </div>
            </div>   

            <div class="modal-footer">
               <td>{{Form::submit('Edit',['name'=>'btnEditsupplier','id'=>'btnEditsupplier','class'=>'btn waves-light btn-medium red'])}}</td>
            </div>
        </div>
  <!-- tutup modal -->
  <!-- INI MENU UTAMA-->
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                  <h5>Data Supplier<a href=""><span></span></a><hr></h5>
                  <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newsupplier'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
                  <tr>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Nomor Handphone</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>ACTION</th>
                  </tr>
                  @foreach($datasupplier as $row)
                  <tr>
                    <td>{{$row->kodesupplier}}</td>
                    <td>{{$row->namasupplier}}</td>
                    <td>{{$row->nomorhpsupplier}}</td>
                    <td>{{$row->alamatsupplier}}</td>
                    <td>{{$row->statussupplier}}</td>
                    @php($kode    = $row->kodesupplier)
                    @php($nama    = $row->namasupplier)
                    @php($hp      = $row->nomorhpsupplier)
                    @php($alamat  = $row->alamatsupplier)
                    @php($status  = $row->statussupplier)
                    <td><a class="waves-effect waves-light btn modal-trigger red" onclick="updatedata('{!! $kode !!}','{!! $nama !!}','{!! $hp !!}','{!! $alamat !!}','{!! $status !!}')" href="#modal_update">EDIT</a></td>
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
  

  function updatedata(kode,nama,hp,alamat,status){
    $('#txtupkodesupplier').val(kode);
    $('#txtupnamasupplier').val(nama);
    $('#txtuphp').val(hp);
    $('#txtupalamat').val(alamat);
    $('#txtupstatus').val(status);
  }	
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>