@extends('layouts.headerAdmin')

@section('content')
{{ Form::open(array('url' => 'savepenjualanBJ')) }}
  <!-- INI MENU UTAMA-->
    <div class="main">
      <div class="row">
        <div class="col m2"></div>
          <div class="col m8">
            <div class="card-panel">
              <div class="row">
                  <h5>Data Penjualan Barang Jadi<a href=""><span></span></a><hr></h5>
                  <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('penjualanBJ'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Kode Customer</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
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
                    <td><a class="waves-effect waves-light btn modal-trigger red left" href="{!! url('updatepenjualanBJ/'.$row->nonotapenjualanBJ); !!}">CHECK</a></td>
                  </tr>
                  @endforeach
                </table>
              </div>
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