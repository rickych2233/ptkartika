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
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
                <h4 class="card-title">History Pelunasan Piutang</h4>
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
                    @if($rows3->nonotapenjualanBJ == $temp1)
                    <tr>
                      <td>{{$rows3->nonotapelunasan}}</td>
                      <td>{{$rows3->tglpelunasan}}</td>
                      @php($hasil_rupiah1 = " Rp " . number_format($rows3->jumlahdibayar,2,',','.'))
                      <td>@php(print_r($hasil_rupiah1))</td>
                    </tr>
                    @endif()
                  @endforeach
                </table>
                <br>
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
                      {{Form::text('txtnonotapelunasan', $kodejum, ['id'=>'txtnonotapelunasan','class'=>'form-control','readonly'=>'readonly'])}}
                    </div>
                </div>
                @foreach($datapenjualanbj as $row)
                  @if($row->nonotapenjualanBJ == $temp1)
                <div class="row">
                  <div class="col m3">Sales Penjualan :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtsalespenjualan', $getkode, null, ['id'=>'txtsalespenjualan','class'=>'form-control']) }}
                    </div>
                </div>
                <div class="row">
                  <div class="col m3">Customer :</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    {{Form::text('txtkodecustomer', $row->kodecustomer, ['id'=>'txtkodecustomer','class'=>'form-control','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col m3">Tanggal :</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    @php($date = date('yy-m-d'))
                    {{Form::text('txttglpelunasan', $date, ['id'=>'txttglpelunasan','class'=>'form-control','readonly'=>'readonly'])}}
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
                    {{Form::text('txtmbn', $sisa, ['id'=>'txtmbn','class'=>'form-control','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col m3">Jumlah Bayar:</div>
                </div>
              <div class="row">
                <div class=" col m6">
                  {{Form::text('txtjumlahdibayar', '', ['id'=>'txtjumlahdibayar','class'=>'form-control'])}}
                  {{Form::hidden('txtnonotapenjualanBJ', $temp1, ['id'=>'txtnonotapenjualanBJ','','class'=>'validate'])}}
              </div>
            </div>
            {{Form::submit('Simpan',['name'=>'btnInsertpiutang','id'=>'btnInsertpiutang','class'=>'btn btn-success btn-sm'])}}
            <input  type='submit' class='btn btn-warning btn-sm' name='btncancels' id='btncancels' value='Cancel'>
              </div>
            </div>
          </div>
        <div>
      </div>
    </div>
</div>
  {{ Form::close() }}
  @endsection
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">\

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