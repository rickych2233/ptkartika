@extends('layouts.headerAdmin')


@section('content')
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savetfpembelian')) }}
  <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5>List hutang ke supplier<a href=""><span></span></a><hr></h5>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Nama Supplier</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Hutang</th>
                  </tr>
                  @foreach($datapenerimaanbb as $row)
                    @if($row->jenispembayaranBB == "HUTANG")
                    <tr>
                        <td>{{$row->nonotapenerimaanBB}}</td>
                        <td>{{$row->kodesupplier}}</td>
                        <td>{{$row->tglpenerimaanBB}}</td>
                        <td>{{$row->grandhargaBB}}</td>
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