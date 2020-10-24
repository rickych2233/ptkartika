@extends('layouts.headerAdmin')
<?php
    $getstatus['AKTIF']     = "AKTIF"; 
    $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 

    $temp1;
    $temp2;
    $temp3 = [];
    $idx = 0;
    if(session()->get("sessionpengiriman")){
      $cart = session()->get("sessionpengiriman");
      $jum  = count($cart);
      for($j=0; $j < $jum; $j++){
        $temp1 = $cart[$j]['nonotapengirimanB'];
      }
    }

    foreach($datauser as $rows){
        if($rows->role == "SALES PENJUALAN")$getkode[$rows->username]   = $rows->username;
    }

    foreach($datacustomer as $rows1){
        $getcust[$rows1->kodecustomer]   = $rows1->namatoko;
    }
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepengirimanbarang')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m5">
            <div class="card-panel">
                <!-- Kode Barang -->
                <div class="row">
                    <div class="col m6">Nomor Nota :</div>
                </div>
                @foreach($datapengiriman as $row)
                    @if($row->nonotapengiriman == $temp1)
                        <div class="row">
                            <div class=" col m6">
                                {{Form::text('txtnonotapengirimanB', '', ['id'=>'txtnonotapengirimanB', 'readonly'=>'readonly'])}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m6">Tanggal Pengiriman :</div>
                        </div>
                        <div class="row">
                            <div class=" col m6">
                                {{Form::date('txttglpengirimanB', date('Y-m-d'), ['id'=>'txttglpengirimanB'])}}
                            </div>
                        </div>
                    @endif
                @endforeach
                 <!-- Tombol Submit -->
                <div class="row">
                    <div class=" col m6">
                        {{Form::submit('Pengiriman',['name'=>'btninsert','id'=>'btninsert','class'=>'btn waves-light btn-medium'])}}
                        <input  type='submit' class='btn waves-light btn-medium' name='btncancels' id='btncancels' value='Cancel'>
                    </div>
                </div>
            </div>
          </div>
          <div class="col m5">
            <div class="card-panel">
                <div class="row">
                    <div class="row">
                        <div class="col m6">Nama Sales Penjualan :</div>
                    </div> 
                    <div class="row">
                        <div class=" col m6">
                        {{ Form::select('txtusername', $getkode, null, ['id'=>'txtusername', 'class'=>'validate browser-default']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col m6">Nama Toko :</div>
                    </div> 
                    <div class="row">
                        <div class=" col m6">
                        {{ Form::select('txtkodecustomer', $getcust, null, ['id'=>'txtkodecustomer', 'class'=>'validate browser-default']) }}
                        </div>
                    </div>
                </div>  
            </div>
          </div>
          <div class="col m10 offset-m1">
            <div class="card-panel">
            <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newbarangbuatpengiriman'); !!}"><i class="large material-icons">shopping_cart</i></a>
            <table border="1">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok Sekarang</th>
                    <th>Stok DiAmbil</th>
                  </tr>
                    @if(session()->get("cartpe")) 
                        @php($cart = session()->get("cartpe"))
                        @php($jum  = count($cart))
                        <input name="somed" id="somed" type="hidden" value="<?php echo ($jum); ?>" >
                        @for($j=0; $j < $jum; $j++)
                            <tr>
                                @php($temp1 = $cart[$j]['kodebarang'])
                                @php($temp2 = $cart[$j]['harga'])
                                <input name="somedataasd" id="somedataasd" type="hidden" value="<?php echo ($temp1); ?>" >
                                {{Form::hidden('txtnonotadpengirimanB', '', ['id'=>'txtnonotadpengirimanB'])}}
                                {{Form::hidden('txtkodebarang'.$temp1, $cart[$j]['kodebarang'], ['id'=>'txtkodebarang'.$temp1])}}
                                <td>{{$cart[$j]['namabarang']}}</td>
                                <td>{{$cart[$j]['harga']}}</td>
                                <td>{{$cart[$j]['stok']}}</td>
                                {{Form::hidden('txtstoksekarang'.$temp1, $cart[$j]['stok'], ['id'=>'txtstoksekarang'.$temp1])}}
                                <td>{{Form::text('txtjumlahbarang'.$temp1, '', ['id'=>'txtjumlahbarang'.$temp1,'onkeyup'=>"penambahan('$temp1')"])}}</td>
                            </tr>
                        @endfor
                        @php($tempAJAX = $temp1)
                    @endif
                </table>
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
  function penambahan(kodebarang){
    var qtytertera      = $("#txtjumlahbarang" + kodebarang).val();
    var qtymengisi      = $("#txtstoksekarang" + kodebarang).val();
    var temptertera = parseInt(qtytertera,10);
    var tempmengisi = parseInt(qtymengisi,10);
    if(qtymengisi !== null  && tempmengisi < temptertera){
      alert("Masih Kosong atau yang diisi lebih besar");
      $('#btninsert').prop('disabled', true);
    }else{
      $('#btninsert').prop('disabled', false);
    }
  }
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>