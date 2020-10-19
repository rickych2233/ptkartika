@extends('layouts.headerAdmin')
<?php
  $getstatus['AKTIF']     = "AKTIF"; 
  $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 
  
  $index = 0;
  $getkode = []; 
  $temps = [];
  foreach($datauser as $rows){
    if($rows->role == "SALES PENJUALAN"){
      $getkode[$rows->username] = $rows->username;
    }
  }

  $temp1;
  if(session()->get("penjualanBJ3")){
    $cart = session()->get("penjualanBJ3");
    $jum  = count($cart);
    for($j=0; $j < $jum; $j++){
      $temp1 = $cart[$j]['nonotapenjualanBJ'];
    }
  }
  // dd($temp1);
?>
@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepenjualanBJ')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
        <div class="col m8 offset-m1">
            <div class="card-panel">
              <div class="row">
                <h5>History Pelunasan Piutang<a href=""><span></span></a><hr></h5>
                @foreach($datadetailpenjualanbj as $rows2)
                  @if($rows2->nonotaBJFK == $temp1)
                  <?php
                    $temps[$index] = $rows2->grandtotalDBJ;
                    $index++;
                  ?>
                  @endif
                @endforeach
                <div class="row">
                    <?php
                      $tempsss  = 0;
                      for($i=0; $i< count($temps); $i++){
                        $tempsss += $temps[$i];
                      }
                      $hasil_rupiah = " Rp " . number_format($tempsss,2,',','.');
                    ?>
                    {{Form::hidden('txtgrandtotal', $tempsss,['id'=>'txtgrandtotal'])}}
                  <div class="col m3">Grand Total :@php(print_r($hasil_rupiah))</div>
                </div>
                <table border="1">
                  <tr>
                    <th>Nomor Nota</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Jumlah di Bayar</th>
                  </tr>
                  @foreach($datapelunasanpiutang as $rows3)
                  <tr>
                    <td>{{$rows3->nonotapelunasan}}</td>
                    <td>{{$rows3->tglpelunasan}}</td>
                    @php($hasil_rupiah1 = " Rp " . number_format($rows3->jumlahdibayar,2,',','.'))
                    <td>@php(print_r($hasil_rupiah1))</td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
          <div class="col m5 offset-m1">
            <div class="card-panel">
              <div class="row">
                <h5>Pelunasan Piutang<a href=""><span></span></a><hr></h5>
                <div class="row">
                  <div class="col m3">Nomor Nota :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      <?php
                        $date     = date('Ym');
                        $jum      = $datapelunasanpiutang->count() + 1; 
                        $kodejum  = "PP".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                      ?>
                      {{Form::text('txtnonotapelunasan', $kodejum, ['id'=>'txtnonotapelunasan','','readonly'=>'readonly'])}}
                    </div>
                </div>
                @foreach($datapenjualanbj as $row)
                  @if($row->nonotapenjualanBJ == $temp1)
                <div class="row">
                  <div class="col m3">Username :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtsalespenjualan', $getkode, null, ['id'=>'txtsalespenjualan', 'class'=>'validate browser-default']) }}
                    </div>
                </div>
                <!-- Tombol Submit -->
                <div class="row">
                    <div class=" col m6">
                      {{Form::submit('Simpan',['name'=>'btnInsertpiutang','id'=>'btnInsertpiutang','class'=>'btn waves-light btn-small'])}}
                      <input  type='submit' class='waves-light btn-small' name='btncancels' id='btncancels' value='Cancel'>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col m5">
            <div class="card-panel">
              <div class="row">
                <div class="row">
                  <div class="col m3">Customer :</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtkodecustomer', $row->kodecustomer, ['id'=>'txtkodecustomer','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col m3">Tanggal :</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    @php($date = date('yy-m-d'))
                    {{Form::text('txttglpelunasan', $date, ['id'=>'txttglpelunasan','readonly'=>'readonly'])}}
                  </div>
                </div>
                  @endif
                @endforeach
                <?php
                  $sisa = $tempsss;
                ?>
                @foreach($datapelunasanpiutang as $row5)
                  @if($row5->nonotapenjualanBJ == $temp1)
                    <?php
                      $sisa -= $row5->jumlahdibayar;
                    ?>
                  @endif
                @endforeach
                <div class="row">
                  <div class="col m3">Sisa piutang:</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtmbn', $sisa, ['id'=>'txtmbn','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col m3">Jumlah Bayar:</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtjumlahdibayar', '', ['id'=>'txtjumlahdibayar'])}}
                    {{Form::hidden('txtnonotapenjualanBJ', $temp1, ['id'=>'txtnonotapenjualanBJ','','class'=>'validate'])}}
                  </div>
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
    $('#txtjumlahdibayar').keyup(function(){
      var jum = $('#txtmbn').val();
      var dijum = $('#txtjumlahdibayar').val();
      var temp = jum-dijum;
      if( temp < 0){
        alert("anda bayar nya lebih");
        $('#btnInsertpiutang').prop('disabled', true);
      }else{
        $('#btnInsertpiutang').prop('disabled', false);
      }
    });
  });
  

  function updatedata(kode,nama,status){
    $('#txtupkodekategoribarang').val(kode);
    $('#txtupnamakategoribarang').val(nama);
    $('#txtupstatuskategoribarang').val(status);
  }


  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>