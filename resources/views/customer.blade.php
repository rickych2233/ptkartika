@extends('layouts.headerAdmin')
<?php
  // $getkode = []; 
  // foreach($datakategoribarang as $rows){
  //   $getkode[$rows->kodekategoribarang] = $rows->namakategoribarang;
  //   $getkode[$rows->kodekategoribarang] = $rows->kodekategoribarang;
  // }
  $getstatus['AKTIF']         = "AKTIF"; 
  $getstatus['TIDAK AKTIF']   = "TIDAK AKTIF"; 
  $gettipepembayaran['YA']      = "YA";
  $gettipepembayaran['TIDAK']   = "TIDAK";
?>
@section('content')

{{ Form::open(array('url' => 'savecustomer')) }}
  <!-- modal -->
  <div id="modal_update" class="modal" style='border-radius:2px;width:40%'>
            <h3 class='rounded-font center white-text red lighten-3' style="padding-top:2%;padding-bottom:3%">Update Kategori Barang</h3>
            <!--<hr class='center' style='border: 1px solid white;margin-top:-3.7%'>-->
            <div class="row">
              <div class="row">
                  <div class="col m6">Kode Customer :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupkodecustomer', '', ['id'=>'txtupkodecustomer', 'readonly'=>'readonly'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Nama Toko :</div>
              </div> 
              <div class="row">
                <div class=" col m6">
                  {{Form::text('txtupnamatoko', '', ['id'=>'txtupnamatoko','','class'=>'validate'])}}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Contact Person :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupcontactperson', '', ['id'=>'txtupcontactperson','','class'=>'validate'])}}  
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
                  <div class="col m6">Kota :</div>
              </div> 
              <div class="row">
                <div class=" col m6">
                  {{Form::text('txtupkota', '', ['id'=>'txtupkota','','class'=>'validate'])}}
                </div>
              </div>
            </div> 
            <div class="row">
              <div class="row">
                  <div class="col m6">Ktp :</div>
              </div> 
              <div class="row">
                <div class=" col m6">
                  {{Form::text('txtupktp', '', ['id'=>'txtupktp','','class'=>'validate'])}}
                </div>
              </div>
            </div> 
            <div class="row">
              <div class="row">
                  <div class="col m6">Hp :</div>
              </div> 
              <div class="row">
                <div class=" col m6">
                  {{Form::text('txtuphp', '', ['id'=>'txtuphp','','class'=>'validate'])}}
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
            <div class="row">
              <div class="row">
                  <div class="col m6">Tipe Pembayaran :</div>
              </div> 
              <div class="row">
                <div class=" col m6">
                  {{ Form::select('txtuptipepembayaran', $gettipepembayaran, null, ['id'=>'txtuptipepembayaran', 'class'=>'validate browser-default']) }}
                </div>
              </div>
            </div> 

            <div class="modal-footer">
                {{ Form::submit('UPDATE',['name'=>'btnedituser','id'=>'btnedituser','class'=>'btn waves-light btn-medium red']) }}
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
                <h5>Data Customer<a href=""><span></span></a><hr></h5>
                <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newcustomer'); !!}"><i class="large material-icons">add</i></a>
              <table>
                  <tr>
                    <th>Kode Customer</th>
                    <th>Nama Toko</th>
                    <!-- <th>Contact Person</th> -->
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Ktp</th>
                    <th>Hp</th>
                    <th>Status</th>
                    <th>Tipe Pembayaran</th>
                    <th>Action</th>
                  </tr>
                  @foreach($datacustomer as $row)
                  <tr>
                    <!-- <td>{{$loop->iteration}}</td> -->
                    <td>{{ $row->kodecustomer }}</td>
                    <td>{{ $row->namatoko }}</td>
                    <!-- <td>{{ $row->contactperson }}</td> -->
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->kota }}</td>
                    <td>{{ $row->ktp }}</td>
                    <td>{{ $row->hp }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->tipepembayaran }}</td>
                    @php($kode    = $row->kodecustomer)
                    @php($namatoko    = $row->namatoko)
                    @php($contactperson  = $row->contactperson)
                    @php($alamat  = $row->alamat)
                    @php($kota  = $row->kota)
                    @php($ktp  = $row->ktp)
                    @php($hp  = $row->hp)
                    @php($status  = $row->status)
                    @php($tipepembayaran  = $row->tipepembayaran)
                    <td><a class="waves-effect waves-light btn modal-trigger red" href="#modal_update" onclick="updatedata('{!! $kode !!}','{!! $namatoko !!}','{!! $contactperson !!}','{!! $alamat !!}','{!! $kota !!}','{!! $ktp !!}','{!! $hp !!}','{!! $status !!}','{!! $tipepembayaran !!}')">EDIT</a></td>
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

  function updatedata(kode,namatoko,contactperson,alamat,kota,ktp,hp,statu,tipepembayaran){
    $('#txtupkodecustomer').val(kode);
    $('#txtupnamatoko').val(namatoko);
    $('#txtupcontactperson').val(contactperson);
    $('#txtupalamat').val(alamat);
    $('#txtupkota').val(kota);
    $('#txtupktp').val(ktp);
    $('#txtuphp').val(hp);
    $('#txtupstatus').val(status);
    $('#txtuptipepembayaran').val(tipepembayaran);
  }
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>