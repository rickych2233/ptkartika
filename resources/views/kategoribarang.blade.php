@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savekategoribarang')) }}
  
  <!-- modal -->
  <div id="modal_update" class="modal" style='border-radius:2px;width:40%'>
            <h3 class='rounded-font center white-text red lighten-3' style="padding-top:2%;padding-bottom:3%">Update Kategori Barang</h3>
            <!--<hr class='center' style='border: 1px solid white;margin-top:-3.7%'>-->
            <div class="row">
              <div class="row">
                  <div class="col m6">Kode Kategori Barang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupkodekategoribarang', '', ['id'=>'txtupkodekategoribarang','','class'=>'validate','readonly'=>'readonly'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Nama Kategori Barang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupnamakategoribarang', '', ['id'=>'txtupnamakategoribarang','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Status Kategori Barang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{ Form::select('txtupstatuskategoribarang', $getstatus, null, ['id'=>'txtupstatuskategoribarang', 'class'=>'validate browser-default']) }}
                  </div>
              </div>
            </div>   

            <div class="modal-footer">
                {{ Form::submit('UPDATE',['name'=>'btnEditbarang','id'=>'btnEditbarang','class'=>'btn waves-light btn-medium red']) }}
            </div>
        </div>
  <!-- tutup modal -->

    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                  <h5>Data Kategori Barang<a href=""><span></span></a><hr></h5>
                  <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newkategoribarang'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
                  <tr>
                    <th>Kode Kategori Barang</th>
                    <th>Nama Kategori Barang</th>
                    <th>Status</th>
                    <th>AKSI</th>
                  </tr>
                  @foreach($datakategoribarang as $row)
                  <tr>
                    <td>{{$row->kodekategoribarang}}</td>
                    <td>{{$row->namakategoribarang}}</td>
                    <td>{{$row->statuskategoribarang}}</td>
                    @php($kode    = $row->kodekategoribarang)
                    @php($nama    = $row->namakategoribarang)
                    @php($status  = $row->statuskategoribarang)
                    <td>
                      <a class="waves-effect waves-light btn modal-trigger red" onclick="updatedata('{!! $kode !!}','{!! $nama !!}','{!! $status !!}')" href="#modal_update">EDIT</a>
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
  

  function updatedata(kode,nama,status){
    $('#txtupkodekategoribarang').val(kode);
    $('#txtupnamakategoribarang').val(nama);
    $('#txtupstatuskategoribarang').val(status);
  }

  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>