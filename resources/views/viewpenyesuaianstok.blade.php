@extends('layouts.headerAdmin')


@section('content')
  {{ Form::open(array('url' => 'savepenyesuaianstok')) }}
  
  <!-- INI MENU UTAMA-->
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">List Pegawai</h4>
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('penyesuaianstok'); !!}">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
                  <tr>
                    <th>Kode Barang</th>
                    <th>Stok Barang Sekarang</th>
                    <th>Stok Barang Revisi</th>
                    <th>Keterangan</th>
                    <th>ACTION</th>
                  </tr>
                  @foreach($datapenyesuaianstok as $row)
                  <tr>
                    <td>{{$row->kodebarang}}</td>
                    <td>{{$row->stokNow}}</td>
                    <td>{{$row->stokRevisi}}</td>
                    <td>{{$row->keterangan}}</td>
                    @php($nonotaPS = $row->nonotaPS)
                    @php($kodebarang  = $row->kodebarang)
                    @php($stokNow  = $row->stokNow)
                    @php($stokRevisi  = $row->stokRevisi)
                    @php($keterangan  = $row->keterangan)
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="updatedata('{!! $nonotaPS !!}','{!! $kodebarang !!}','{!! $stokNow !!}','{!! $stokRevisi !!}','{!! $keterangan !!}')" href="#modal_update">UPDATE</a></td>
                  </tr>
                  @endforeach
                </table>
              </div>
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
                  <div class="col-1-2">Kode Barang :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                    {{Form::text('txtupkodebarang', '', ['id'=>'txtupkodebarang','','class'=>'form-control','readonly'=>'readonly'])}}
                    {{Form::hidden('txtupnonotaPS', '',['id'=>'txtupnonotaPS'])}}
                  </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Stok Barang Sekarang :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                  {{Form::text('txtupstokNow', '', ['id'=>'txtupstokNow','','class'=>'form-control'])}}
                  </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Stok Barang Revisi :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                    {{Form::text('txtupstokRevisi', '', ['id'=>'txtupstokRevisi','','class'=>'form-control'])}}
                  </div>
              </div>
            </div>   
            <div class="container">
              <div class="row">
                  <div class="col-1-2">Keterangan :</div>
              </div> 
              <div class="row">
                  <div class="col-3-2">
                    {{Form::text('txtupketerangan', '', ['id'=>'txtupketerangan','','class'=>'form-control'])}}
                  </div>
              </div>
            </div>   

            <div class="modal-footer">
                {{ Form::submit('UPDATE',['name'=>'btnupdate','id'=>'btnupdate','class'=>'btn waves-light btn-medium red']) }}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- tutup modal -->
{{ Form::close() }}
@endsection
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });
  $('.dropdown-trigger').dropdown();


  function updatedata(nonotaPS,kodebarang,stokNow,stokRevisi,keterangan){
    $('#txtupnonotaPS').val(nonotaPS);
    $('#txtupkodebarang').val(kodebarang);
    $('#txtupstokNow').val(stokNow);
    $('#txtupstokRevisi').val(stokRevisi);
    $('#txtupketerangan').val(keterangan);
  }
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>