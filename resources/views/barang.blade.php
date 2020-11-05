@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
?>
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
@section('content')
{{ Form::open(array('url' => 'savebarang')) }}
  
  <!-- ======================================================= -->
  <!-- INI MENU UTAMA-->
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">List Barang</h4>
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newbarang'); !!}">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
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
            </thead>
            <tbody>
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
              <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="updatedata('{!! $kode !!}','{!! $nama !!}','{!! $kategori !!}','{!! $satuan !!}','{!! $stok !!}','{!! $harga !!}','{!! $status !!}')">EDIT</button></td>
            </tr> 
            @endforeach
            </tbody>
          </table>
        </div>
        {{ $databarang->links() }}
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
        <div class="container">
          <div class="row">
            <div class="col-1-2">Kode Barang :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{Form::text('txtupkodebarang', '', ['id'=>'txtupkodebarang','','class'=>'validate','readonly'=>'readonly'])}}
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-1-2">Nama Barang :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{Form::text('txtupnamabarang', '', ['id'=>'txtupnamabarang','','class'=>'validate'])}}
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-1-2">Kode Kategori Barang :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
            {{Form::text('txtupkodekategoribarang', '', ['id'=>'txtupkodekategoribarang','','class'=>'validate','readonly'=>'readonly'])}}
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-1-2">Satuan :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{Form::text('txtupsatuanbarang', '', ['id'=>'txtupsatuanbarang','','class'=>'validate'])}}
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-1-2">Stok :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{Form::text('txtupstokbarang', '', ['id'=>'txtupstokbarang','','class'=>'validate'])}}
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-1-2">Harga :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{Form::text('txtuphargabarang', '', ['id'=>'txtuphargabarang','','class'=>'validate'])}}
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-1-2">Status :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{ Form::select('txtupstatusbarang', $getstatus, null, ['id'=>'txtupstatusbarang', 'class'=>'validate browser-default']) }}
            </div>
          </div>
        </div>

        <div class="modal-footer">
            <!-- <i class="material-icons" id="help">help</i> -->
            {{ Form::submit('Submit',['name'=>'btnupbarang','id'=>'btnupbarang','class'=>'btn waves-light btn-medium red']) }}            </div>
        </div>

      </div>
    </div>
  </div>
</div>
{{ Form::close() }}
@endsection

<script>
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