@extends('layouts.headerAdmin')


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
  {{ Form::open(array('url' => 'savetfpembelian')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">List Pembelian Bahan Baku</h4>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($databarang as $row)
                  <tr>
                  @if($row->kodekategoribarang != "KB001")
                  
                    <td>{{$row->kodebarang}}</td>
                    <td>{{$row->namabarang}}</td>
                    <td>{{$row->satuan}}</td>
                    <td>{{$row->harga}}</td>
                    <td>{{$row->status}}</td>
                    @php($check = false)
                    @if(session()->get("cartDPS"))
                      @php($cart = session()->get("cartDPS"))
                      @php($jum  = count($cart))
                      @for($j=0; $j < $jum; $j++)
                        @php($temp1 = $cart[$j]['kodebarang'])
                        @if($temp1 == $row->kodebarang)
                          @php($check = true)
                        @endif
                      @endfor
                      @if($check == true)
                        <td><a class="btn disabled left">CHECK</a></td>
                      @else
                        <td><a class="waves-effect waves-light btn modal-trigger left" href="{!! url('addtocartDPS/'.$row->kodebarang); !!}">CHECK</a></td>
                      @endif
                    @else
                      <td><a class="waves-effect waves-light btn modal-trigger left" href="{!! url('addtocartDPS/'.$row->kodebarang); !!}">CHECK</a></td>
                    @endif
                  @endif
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
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr/latest/css/toastr.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>

  //Materialize
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