@extends('layouts.headerAdmin')


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
@section('content')
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepengirimanbarang')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">List Pengiriman</h4>
          <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newpengiriman'); !!}"><i class="large material-icons">add</i></a>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Sales Penjualan</th>
                    <th>Kode Customer</th>
                    <th>Action</th>
                  </tr>
                  @foreach($datapengirimanbarang as $row)
                  <tr>
                    <td>{{$row->nonotapengirimanB}}</td>
                    <td>{{$row->tglpengirimanB}}</td>
                    <td>{{$row->username}}</td>
                    <td>{{$row->kodecustomer}}</td>
                    <td>
                      <a class="waves-effect waves-light btn modal-trigger yellow darken-1 left" href="{!! url('updatepengirimanbarang/'.$row->nonotapengirimanB); !!}">UPDATE</a>
                    </td>
                    <td><a class="waves-effect waves-light btn modal-trigger green darken-1 left" href="{!! url('returpengirimanbarang/'.$row->nonotapengirimanB); !!}">RETUR</a></td>
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
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>