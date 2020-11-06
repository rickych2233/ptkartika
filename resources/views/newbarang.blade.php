@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
  $getkode = [];
  foreach($datakategoribarang as $rows){
    $getkode[$rows->kodekategoribarang] = $rows->namakategoribarang;
  }
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
  {{ Form::open(array('url' => 'savebarang')) }}
  <div class="row">
    <div class="col-md-12 ">
      <div class="card">
        <div class="card-header ">
          </div>
            <div class="card-body ">
              <div class="row">
                  <div class=" col m6"><h5>Barang Baru<a href=""><span></span></a><hr></h5></div>
              </div>
              <!-- Kode Barang -->
              <div class="container float-left">
                <div class="form-group">
                  <?php
                      $jum     = $databarang->count() + 1; 
                      $kodebrg = "B".str_pad($jum, 3, "0",STR_PAD_LEFT);
                  ?>
                  <label>Kode Barang :</label>
                  {{Form::text('txtkodebarang', $kodebrg, ['id'=>'txtkodebarang', 'readonly'=>'readonly','class'=>'form-control'])}}
                </div> 
              </div>
              <!-- Nama Barang -->
              <div class="container float-left">
                <div class="form-group">
                <label>Nama Barang :</label>
                {{Form::text('txtnamabarang', '', ['id'=>'txtnamabarang', 'placeholder'=>'Gula Pasir','class'=>'form-control'])}}
                </div> 
              </div>
              <!-- Kategori Barang -->
              <div class="container float-left">
                <div class="form-group">
                <label>Kategori Barang :</label>
                {{ Form::select('txtkodekategoribarang', $getkode, null, ['id'=>'txtkodekategoribarang','class'=>'form-control']) }}
                </div> 
              </div>
            <!-- Satuan Barang -->
            <div class="container float-left">
                <div class="form-group">
                <label>Satuan :</label>
                  {{Form::text('txtsatuanbarang', '', ['id'=>'txtsatuanbarang', 'placeholder'=>'Biji','class'=>'form-control'])}}
                </div> 
              </div>
            <!-- Stok Barang -->
            <div class="container float-left">
              <div class="form-group">
              <label>Stok :</label>
              {{Form::text('txtstokbarang', '', ['id'=>'txtstokbarang', 'placeholder'=>'10','class'=>'form-control'])}}
             </div>
            </div>
            <!-- Harga Barang -->
            <div class="container float-left">
              <div class="form-group">
              <label>Harga Satuan :</label>
              {{Form::text('txthargabarang', '', ['id'=>'txthargabarang', 'placeholder'=>'1000','class'=>'form-control'])}}
              </div>
            </div>
            <!-- Status Barang -->
            <div class="container float-left">
              <div class="form-group">
              <label>Status :</label>
              {{ Form::select('txtstatusbarang', $getstatus, null, ['id'=>'txtstatusbarang','class'=>'form-control']) }}
              </div>
            </div>
            <!-- Tombol Submit -->
            <div class="container float-left">
                <div class=" col m6">
                  {{Form::submit('Insert',['name'=>'btninsertbarang','id'=>'btninsertbarang','class'=>'btn btn-primary'])}}
                  <button type="button" class="btn btn-primary" name='btncancel' id='btncancel' value='Cancel'>Cancel</button>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
  {{ Form::close() }}
  @endsection

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