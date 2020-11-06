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
{{ Form::open(array('url' => 'savesupplier')) }}
  <!-- INI MENU UTAMA-->
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">List Supplier</h4>
<<<<<<< HEAD
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newsupplier'); !!}">Tambah</a>
=======
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newsupplier'); !!}"><i class="large material-icons">add</i></a>
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <tr>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Nomor Handphone</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
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
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  onclick="updatedata('{!! $kode !!}','{!! $nama !!}','{!! $hp !!}','{!! $alamat !!}','{!! $status !!}')" href="#modal_update">EDIT</button></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        {{ $datasupplier->links() }}
      </div>
    </div>
  </div>
</div>

<!-- modal -->
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
            <div class="col-1-2">Kode Supplier :</div>
        </div> 
        <div class="row">
            <div class="col-3-2">
              {{Form::text('txtupkodesupplier', '', ['id'=>'txtupkodesupplier','','class'=>'validate','readonly'=>'readonly'])}}
            </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <div class="col-1-2">Nama Supplier :</div>
        </div> 
        <div class="row">
            <div class="col-3-2">
            {{Form::text('txtupnamasupplier', '', ['id'=>'txtupnamasupplier','','class'=>'validate'])}}
            </div>
        </div>
      </div> 
      <div class="container">
        <div class="row">
            <div class="col-1-2">Handphone :</div>
        </div> 
        <div class="row">
            <div class="col-3-2">
            {{Form::text('txtuphp', '', ['id'=>'txtuphp','','class'=>'validate'])}}
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
            <div class="col-1-2">Status :</div>
        </div> 
        <div class="row">
            <div class="col-3-2">
              {{ Form::select('txtupstatus', $getstatus, null, ['id'=>'txtupstatus', 'class'=>'validate browser-default']) }}
            </div>
        </div>
      </div>   

      <div class="modal-footer">
          <td>{{Form::submit('Edit',['name'=>'btnEditsupplier','id'=>'btnEditsupplier','class'=>'btn waves-light btn-medium red'])}}</td>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- tutup modal -->
{{ Form::close() }}
@endsection

<script>
  function updatedata(kode,nama,hp,alamat,status){
    $('#txtupkodesupplier').val(kode);
    $('#txtupnamasupplier').val(nama);
    $('#txtuphp').val(hp);
    $('#txtupalamat').val(alamat);
    $('#txtupstatus').val(status);
  }	
</script>