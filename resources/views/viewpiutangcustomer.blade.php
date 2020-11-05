@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepenjualanBJ')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Piutang Customer</h4>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                  </tr>
                  @foreach($datapenjualanbj as $row)
                    @if($row->statusBJ == "TIDAK")
                    <tr>
                      <td>{{$row->nonotapenjualanBJ}}</td>
                      <td>{{$row->kodecustomer}}</td>
                      <td>{{$row->tglpembelianBJ}}</td>
                      <td>{{$row->statusBJ}}</td>
                    </tr>
                    @endif
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
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>