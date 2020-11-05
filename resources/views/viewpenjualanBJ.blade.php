@extends('layouts.headerAdmin')

@section('content')
{{ Form::open(array('url' => 'savepenjualanBJ')) }}
  <!-- INI MENU UTAMA-->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Penjualan Barang Jadi</h4>
            <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('penjualanBJ'); !!}"><i class="large material-icons">add</i></a>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr>
                      <th>Nomor Nota</th>
                      <th>Kode Customer</th>
                      <th>Tanggal Pembelian</th>
                      <th>Status Pembayaran</th>
                      <th>Jenis Pembayaran</th>
                      <th>ACTION</th>
                    </tr>
                  @foreach($datapenjualanBJ as $row)
                  <tr>
                    <td>{{$row->nonotapenjualanBJ}}</td>
                    <td>{{$row->kodecustomer}}</td>
                    <td>{{$row->tglpembelianBJ}}</td>
                    <td>{{$row->statusBJ}}</td>
                    <td>{{$row->jenispembayaranBJ}}</td>
                    @php($nonotapenjualanBJ   = $row->nonotapenjualanBJ)
                    @php($kodesupplierBJ      = $row->kodesupplierBJ)
                    @php($tglpembelianBJ      = $row->tglpembelianBJ)
                    @php($statusBJ            = $row->statusBJ)
                    @php($jenispembayaranBJ   = $row->jenispembayaranBJ)
                    @php($nonotaBFJK          = $row->nonotaBFJK)
                    <td>
                      <a class="waves-effect waves-light btn modal-trigger yellow darken-1 left" href="{!! url('updatepenjualanBJ/'.$row->nonotapenjualanBJ); !!}">UPDATE</a>
                      <a style="margin-left:3%" class="waves-effect waves-light btn modal-trigger red left"  href="{!! url('pelunasanpiutang/'.$row->nonotapenjualanBJ); !!}">Pembayaran Piutang</a>
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