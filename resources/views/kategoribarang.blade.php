@extends('layouts.headerAdmin')
@section('title')
<?php
  $getstatus['AKTIF']         = "AKTIF"; 
  $getstatus['TIDAK AKTIF']        = "TIDAK AKTIF"; 
?>
@endsection
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
{{ Form::open(array('url' => 'savekategoribarang')) }}
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> List Kategori Barang</h4>
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newkategoribarang'); !!}">Tambah</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <tr>
                <th>Kode Kategori Barang</th>
                <th>Nama Kategori Barang</th>
                <th>Status</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
            @foreach($datakategoribarang as $row)
              <tr>
                <td>{{$row->kodekategoribarang}}</td>
                <td>{{$row->namakategoribarang}}</td>
                <td>{{$row->statuskategoribarang}}</td>
                @php($kode    = $row->kodekategoribarang)
                @php($nama    = $row->namakategoribarang)
                @php($status  = $row->statuskategoribarang)
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="updatedata('{!! $kode !!}','{!! $nama !!}','{!! $status !!}')" href="#modal_update">EDIT</button>
                </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-1-2">Kode Kategori Barang :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
            {{Form::text('txtupkodekategoribarang', '', ['id'=>'txtupkodekategoribarang','','class'=>'form-control','readonly'=>'readonly'])}}
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-1-2">Nama Kategori Barang :</div>
          </div>
          <div class="row">
            <div class="col-3-2">
              {{Form::text('txtupnamakategoribarang', '', ['id'=>'txtupnamakategoribarang','','class'=>'form-control'])}}
            </div>
          </div>
        </div>

        <div class="Container">
          <div class="row">
              <div class="col-1-2">Status Kategori Barang :</div>
          </div> 
          <div class="row">
              <div class="col-3-2">
                {{ Form::select('txtupstatuskategoribarang', $getstatus, null, ['id'=>'txtupstatuskategoribarang', 'class'=>'validate browser-default']) }}
              </div>
          </div>
        </div>   
        
        <div class="modal-footer">
          {{ Form::submit('UPDATE',['name'=>'btnEditbarang','id'=>'btnEditbarang','class'=>'btn waves-light btn-medium red']) }}
        </div>
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}
@endsection
@section('scripts')
@endsection
<script>
  function updatedata(kode,nama,status){
    $('#txtupkodekategoribarang').val(kode);
    $('#txtupnamakategoribarang').val(nama);
    $('#txtupstatuskategoribarang').val(status);
  }
</script>