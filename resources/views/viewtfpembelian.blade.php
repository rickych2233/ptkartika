@extends('layouts.headerAdmin')


@section('content')
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savetfpembelian')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Pembelian Supplier</h4>
            <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('tfpembelian'); !!}"><i class="large material-icons">add</i></a>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                    <th>ACTION</th>
                  </tr>
                  @foreach($datatfpembelian as $row)
                  <tr>
                    <td>{{$row->nonotaTFPembelian}}</td>
                    <td>{{$row->tglpembelianTF}}</td>
                    <td>{{$row->statusTF}}</td>
                    <td><a class="waves-effect waves-light btn modal-trigger red left" href="{!! url('updatetfpembelian/'.$row->nonotaTFPembelian); !!}">CHECK</a></td>
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