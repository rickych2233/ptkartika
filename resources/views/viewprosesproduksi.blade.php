@extends('layouts.headerAdmin')


@section('content')
  {{ Form::open(array('url' => 'saveprosesproduksi')) }}
  <!-- INI MENU UTAMA-->
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">List Proses Produksi</h4>
          <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('prosesproduksi'); !!}"><i class="large material-icons">add</i></a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <tr>
                  <th>Nomor Nota</th>
                  <th>Tanggal Barang Jadi</th>
                  <th>Kode Barang</th>
                  <th>Qty Hasil</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
              @foreach($dataprosesproduksi as $row)
                <tr>
                  <td>{{$row->nonotaPP}}</td>
                  {{Form::hidden('txthidenonotaPP', $row->nonotaPP,['id'=>'txthidenonotaPP'])}}
                  <td>{{$row->tglPP}}</td>
                  <td>{{$row->kodebarang}}</td>
                  <td>{{$row->qtyhasilPP}}</td>
                  <td><a class="btn btn-primary btn-sm-lg" href="{!! url('updateprosesproduksi/'.$row->nonotaPP); !!}">UPDATE</a></td>
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
  <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet"/>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>

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