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
  
<!-- INI MENU UTAMA-->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">List Customer</h4>
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newcustomer'); !!}"><i class="large material-icons">add</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <tr>
                <th>Customer</th>
                <th>Nama Toko</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Hp</th>
                <th>Status</th>
                <th>Tipe Pembayaran</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($datacustomer as $row)
              <tr>
              <td>{{ $row->kodecustomer }}</td>
                <td>{{ $row->namatoko }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->kota }}</td>
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
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="updatedata('{!! $kode !!}','{!! $namatoko !!}','{!! $contactperson !!}','{!! $alamat !!}','{!! $kota !!}','{!! $ktp !!}','{!! $hp !!}','{!! $status !!}','{!! $tipepembayaran !!}')">EDIT</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
              <div class="container">
                <div class="row">
                  <div class="col-1-2">Kode Customer :</div>
                </div> 
              <div class="row">
                  <div class="col-3-2">
                    {{Form::text('txtupkodecustomer', '', ['id'=>'txtupkodecustomer', 'readonly'=>'readonly'])}}
                  </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Nama Toko :</div>
              </div> 
              <div class="row">
                <div class="col-3-2">
                  {{Form::text('txtupnamatoko', '', ['id'=>'txtupnamatoko','','class'=>'validate'])}}
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Contact Person :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                    {{Form::text('txtupcontactperson', '', ['id'=>'txtupcontactperson','','class'=>'validate'])}}  
                  </div>
              </div>
            </div>   
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Alamat :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                   {{Form::text('txtupalamat', '', ['id'=>'txtupalamat','','class'=>'validate'])}}
                  </div>
              </div>
            </div> 
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Kota :</div>
              </div> 
              <div class="row">
                <div class="col-3-2">
                  {{Form::text('txtupkota', '', ['id'=>'txtupkota','','class'=>'validate'])}}
                </div>
              </div>
            </div> 
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Ktp :</div>
              </div> 
              <div class="row">
                <div class="col-3-2">
                  {{Form::text('txtupktp', '', ['id'=>'txtupktp','','class'=>'validate'])}}
                </div>
              </div>
            </div> 
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Hp :</div>
              </div> 
              <div class="row">
                <div class="col-3-2">
                  {{Form::text('txtuphp', '', ['id'=>'txtuphp','','class'=>'validate'])}}
                </div>
              </div>
            </div> 
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Status :</div>
              </div> 
              <div class="row">
                <div class="col-3-2">
                  {{ Form::select('txtupstatus', $getstatus, null, ['id'=>'txtupstatus', 'class'=>'validate browser-default']) }}
                </div>
              </div>
            </div> 
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Tipe Pembayaran :</div>
              </div> 
              <div class="row">
                <div class="col-3-2">
                  {{ Form::select('txtuptipepembayaran', $gettipepembayaran, null, ['id'=>'txtuptipepembayaran', 'class'=>'validate browser-default']) }}
                </div>
              </div>
            </div>
        <div class="modal-footer">
            {{ Form::submit('Submit',['name'=>'btnupbarang','id'=>'btnupbarang','class'=>'btn waves-light btn-medium red']) }}            </div>
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