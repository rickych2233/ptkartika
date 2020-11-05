@extends('layouts.headerAdmin')
<?php
  $tempchart1 = [];
  $idx = 0;
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepenerimaanBB')) }}
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5>Penerimaan Bahan Baku<a href=""><span></span></a><hr></h5>
              <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newpenerimaanBB'); !!}"><i class="large material-icons">add</i></a>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <tr>
                      <th>Nomor Nota</th>
                      <th>Tanggal Penerimaan</th>
                      <th>Status Penerimaan</th>
                      <th>Jenis Penerimaan</th>
                      <th>ACTION</th>
                    </tr>
                    @foreach($datapenerimaanbb as $row)
                    <tr>
                      <td>{{$row->nonotapenerimaanBB}}</td>
                      <td>{{$row->tglpenerimaanBB}}</td>
                      <td>{{$row->statuspenerimaanBB}}</td>
                      <td>{{$row->jenispembayaranBB}}</td>
                      <td><a class="waves-effect waves-light btn modal-trigger red left" href="{!! url('updateBB/'.$row->nonotapenerimaanBB); !!}">CHECK</a></td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
  {{ Form::close() }}
  @endsection
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });
  $('.dropdown-trigger').dropdown();

  

  function updatedata(kode,nama){
    $('#txtupkodekategoribarang').val(kode);
    $('#txtupnamakategoribarang').val(nama);
  }

  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>


<script>
    
</script>