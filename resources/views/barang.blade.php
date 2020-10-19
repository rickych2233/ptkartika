@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
?>
@section('content')
{{ Form::open(array('url' => 'savebarang')) }}
  <!-- modal -->
  <div id="modal_update" class="modal" style='border-radius:2px;width:40%'>
            <h3 class='rounded-font center white-text red lighten-3' style="padding-top:2%;padding-bottom:3%">Update Kategori Barang</h3>
            <div class="row">
              <div class="row">
                  <div class="col m5">Kode Barang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupkodebarang', '', ['id'=>'txtupkodebarang','','class'=>'validate','readonly'=>'readonly'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m5">Nama Barang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupnamabarang', '', ['id'=>'txtupnamabarang','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m5">Kode Kategori Barang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupkodekategoribarang', '', ['id'=>'txtupkodekategoribarang','','class'=>'validate','readonly'=>'readonly'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m5">Satuan :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupsatuanbarang', '', ['id'=>'txtupsatuanbarang','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m5">Stok :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupstokbarang', '', ['id'=>'txtupstokbarang','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m5">Harga :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtuphargabarang', '', ['id'=>'txtuphargabarang','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m5">Status:</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{ Form::select('txtupstatusbarang', $getstatus, null, ['id'=>'txtupstatusbarang', 'class'=>'validate browser-default']) }}
                  </div>
              </div>
            </div> 

            <div class="modal-footer">
                <!-- <i class="material-icons" id="help">help</i> -->
                {{ Form::submit('Submit',['name'=>'btnupbarang','id'=>'btnupbarang','class'=>'btn waves-light btn-medium red']) }}            </div>
            </div>
  <!-- tutup modal -->
  <!-- ======================================================= -->
  <!-- INI MENU UTAMA-->
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
        <div class="col m10">
          <div class="card-panel">
            <div class="row">
                <h5>Data Barang<a href=""></a><hr></h5>
                <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newbarang'); !!}"><i class="large material-icons">add</i></a>
               <table>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kode Kategori Barang</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Harga</th>  
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @foreach($databarang as $row)
                  <tr>
                    <!-- <td>{{$loop->iteration}}</td> -->
                    <td>{{ $row->kodebarang }}</td>
                    <td>{{ $row->namabarang }}</td>
                    <td>{{ $row->kodekategoribarang }}</td>
                    <td>{{ $row->satuan }}</td>
                    <td>{{ $row->stok }}</td>
                    @php($hasil_rupiah = number_format($row->harga, 2, ".", ","))
                    <td>{{ $hasil_rupiah }}</td>
                    <td>{{ $row->status }}</td>
                    @php($kode      = $row->kodebarang)
                    @php($nama      = $row->namabarang)
                    @php($kategori  = $row->kodekategoribarang)
                    @php($satuan    = $row->satuan)
                    @php($stok      = $row->stok)
                    @php($harga     = $row->harga)
                    @php($status    = $row->status)
                    <td><a class="waves-effect waves-light btn modal-trigger red" onclick="updatedata('{!! $kode !!}','{!! $nama !!}','{!! $kategori !!}','{!! $satuan !!}','{!! $stok !!}','{!! $harga !!}','{!! $status !!}')" href="#modal_update">EDIT</a></td>
                  </tr> 
                  @endforeach
              </table>
            </div>
            {{ $databarang->links() }}
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });

  function updatedata(kode,nama,kategori,satuan,stok,harga,status){
    $('#txtupkodebarang').val(kode);
    $('#txtupnamabarang').val(nama);
    $('#txtupkodekategoribarang').val(kategori);
    $('#txtupsatuanbarang').val(satuan);
    $('#txtupstokbarang').val(stok);
    $('#txtuphargabarang').val(harga);
    $('#txtupstatusbarang').val(status);
  }

  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>