@extends('layouts.headerAdmin')


@section('content')
  {{ Form::open(array('url' => 'savepenyesuaianstok')) }}
  <!-- modal -->
  <div id="modal_update" class="modal" style='border-radius:2px;width:40%'>
            <h3 class='rounded-font center white-text red lighten-3' style="padding-top:2%;padding-bottom:3%">Update Penyesuaian Stok</h3>
            <!--<hr class='center' style='border: 1px solid white;margin-top:-3.7%'>-->
            <div class="row">
              <div class="row">
                  <div class="col m6">Kode Barang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupkodebarang', '', ['id'=>'txtupkodebarang','','class'=>'validate','readonly'=>'readonly'])}}
                    {{Form::hidden('txtupnonotaPS', '',['id'=>'txtupnonotaPS'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Stok Barang Sekarang :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                  {{Form::text('txtupstokNow', '', ['id'=>'txtupstokNow','','class'=>'validate'])}}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                  <div class="col m6">Stok Barang Revisi :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupstokRevisi', '', ['id'=>'txtupstokRevisi','','class'=>'validate'])}}
                  </div>
              </div>
            </div>   
            <div class="row">
              <div class="row">
                  <div class="col m6">Keterangan :</div>
              </div> 
              <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtupketerangan', '', ['id'=>'txtupketerangan','','class'=>'validate'])}}
                  </div>
              </div>
            </div>   

            <div class="modal-footer">
                {{ Form::submit('UPDATE',['name'=>'btnupdate','id'=>'btnupdate','class'=>'btn waves-light btn-medium red']) }}
            </div>
        </div>
  <!-- tutup modal -->
  <!-- INI MENU UTAMA-->
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m10">
            <div class="card-panel">
              <div class="row">
                  <h5>Data Penyesuaian Stok<a href=""><span></span></a><hr></h5>
                  <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('penyesuaianstok'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
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
                    <td><a class="waves-effect waves-light btn modal-trigger red" onclick="updatedata('{!! $nonotaPS !!}','{!! $kodebarang !!}','{!! $stokNow !!}','{!! $stokRevisi !!}','{!! $keterangan !!}')" href="#modal_update">EDIT</a></td>
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