@extends('layouts.headerAdmin')
<?php
    session_start();
    $temp1;
    $temp2;
    $temp3 = [];
    $idx = 0;
    if(session()->get("penjualanBJ2")){
      $cart = session()->get("penjualanBJ2");
      $jum  = count($cart);
      for($j=0; $j < $jum; $j++){
        $temp1 = $cart[$j]['nonotapenjualanBJ'];
      }
    }
    foreach($datacustomer as $rows){
        $getkode[$rows->kodecustomer] = $rows->namatoko;
    }

    foreach($datadetailpenjualanbj as $rowsss){
      if($temp1 == $rowsss->nonotaBJFK){
        $getname[$rowsss->nonotaDBJ] = $rowsss->nonotaDBJ;
      }
    }
    $pembayaran['LUNAS']     = "LUNAS"; 
    $pembayaran['HUTANG']    = "HUTANG"; 
    $getstatus['LUNAS']     = "LUNAS"; 
    $getstatus['TIDAK']     = "TIDAK"; 
    $pesan['PESANAN']     = "PESANAN"; 
    $pesan['SELESAI']     = "SELESAI"; 
?>
@section('content')
{{ Form::open(array('url' => 'savepenjualanBJ')) }}
  <!-- INI MENU UTAMA-->
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m5">
            <div class="card-panel ">
              <div class="row">
                <h5>Update Penjualan Barang jadi<a href=""><span></span></a><hr></h5>
                @foreach($datapenjualanbj as $row)    
                    @if($temp1 == $row->nonotapenjualanBJ)
                    <!-- Kode Customer -->
                    <div class="row">
                        <div class="col m5">Nama Toko :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                            {{Form::hidden('txtupnonotapenjualanBJ', $temp1,['id'=>'txtupnonotapenjualanBJ'])}}
                            {{ Form::select('txtupkodecustomer', $getkode, $row->kodecustomer, ['id'=>'txtupkodecustomer', 'class'=>'validate browser-default']) }}
                        </div>
                    </div>
                    <!-- Tanggal Pembelian -->
                    <div class="row">
                        <div class="col m5">Tanggal Pembelian :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                            {{Form::text('txtuptglpembelianBJ', $row->tglpembelianBJ, ['id'=>'txtuptglpembelianBJ', 'readonly'=>'readonly'])}}
                        </div>
                    </div>
                    @endif
                @endforeach
              </div>
              <!-- Tombol Submit -->
              <div class="row">
                <div class=" col m8">
                {{Form::submit('Update',['name'=>'btnInsertPBJ','id'=>'btnInsertPBJ','class'=>'btn waves-light btn-medium'])}}
                {{ Form::submit('cancel',['name'=>'btncancels','id'=>'btncancels','class'=>'btn waves-light btn-medium red']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="col m5">
            <div class="card-panel ">
              <div class="row">
                <h5>Update Penjualan Barang jadi<a href=""><span></span></a><hr></h5>
                @foreach($datapenjualanbj as $row)    
                    @if($temp1 == $row->nonotapenjualanBJ)
                    <!-- Status Pembelian -->
                    <div class="row">
                        <div class="col m5">Status Pembelian :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                        {{ Form::select('txtupstatuspembelian', $getstatus, $row->statusBJ, ['id'=>'txtupstatuspembelian', 'class'=>'validate browser-default']) }}
                        </div>
                    </div>
                    <!-- Jenis Pembayaran -->
                    <div class="row">
                        <div class="col m5">Jenis Pembayaran :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                        {{ Form::select('txtupjenispembayaran', $pembayaran, $row->jenispembayaranBJ, ['id'=>'txtupjenispembayaran', 'class'=>'validate browser-default']) }}
                        </div>
                    </div>
                    <!-- Status Pemesanan -->
                    <div class="row">
                        <div class="col m5">Status Pemesanan :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                        {{ Form::select('txtupstatuspemesanan', $pesan, $row->statuspesanBJ, ['id'=>'txtupstatuspemesanan', 'class'=>'validate browser-default']) }}
                        </div>
                    </div>
                    @endif
                @endforeach
              </div>
            </div>
          </div>
        <div class="col m10 offset-m1">
          <div class="card-panel">
            <div class="row">
              <table border="1">
                <tr>
                  <th>Nama Kategori Barang</th>
                  <th>Satuaan</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Grand Total</th>
                  <th>Status</th>
                </tr>
                @foreach($datadetailpenjualanbj as $rows)
                  @if($temp1 == $rows->nonotaBJFK)
                  <tr>
                    @php($temp2 = $rows->nonotaDBJ)
                    <?php
                      $temp3[$idx] = $temp2;
                      $idx++;
                      // dd($temp2);
                    ?>
                    {{Form::hidden('txtupnomornotaDBJ'.$temp2, $rows->nonotaDBJ, ['id'=>'txtupnomornotaDBJ'.$temp2])}}
                    <td>{{Form::text('txtupnamabarangDBJ'.$temp2, $rows->namabarangDBJ, ['id'=>'txtupnamabarangDBJ'.$temp2, 'readonly'=>'readonly',''])}}</td>
                    <td>{{Form::text('txtupsatuanDBJ'.$temp2, $rows->satuaanDBJ, ['id'=>'txtupsatuanDBJ'.$temp2, 'readonly'=>'readonly',''])}}</td>
                    <td>{{Form::text('txtuphargaDBJ'.$temp2, $rows->hargaDBJ, ['id'=>'txtuphargaDBJ'.$temp2, 'readonly'=>'readonly',''])}}</td>
                    <td>{{Form::text('txtupqtyDBJ'.$temp2, $rows->qtyDBJ, ['id'=>'txtupqtyDBJ'.$temp2,'onkeyup'=>"penambahan($temp2)"])}}</td>
                    <td>{{Form::text('txtupgrandtotalDBJ'.$temp2, $rows->grandtotalDBJ, ['id'=>'txtupgrandtotalDBJ'.$temp2,'',''])}}</td>
                    <td>{{ Form::select('txtstatusDBJ'.$temp2, $pesan, null,['id'=>'txtstatusDBJ'.$temp2, 'class'=>'validate browser-default']) }}</td>
                    {{Form::hidden('txtupasdnonotaBJFK'.$temp2, $temp1,['id'=>'txtupasdnonotaBJFK'])}}      
                  </tr> 
                  @endif
                @endforeach
                <?php
                  session(['notaDBJ1' => $temp3]);
                ?>
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
  function penambahan(kodebarang){
    var hrg   = $("#txtuphargaDBJ" + kodebarang).val();
    var qty   = $("#txtupqtyDBJ" + kodebarang).val();
    var hasil = hrg * qty;
    $("#txtupgrandtotalDBJ" + kodebarang).val(hasil);
  }

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