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
          <div class="col m5">
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
                        // dd($datapelunasanpiutang);
                        $kodejum  = "PS".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
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
                    {{Form::text('txtkodecustomer', $row->kodecustomer, ['id'=>'txtkodecustomer','',''])}}
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
                @foreach($datadetailpenjualanbj as $rows2)
                  @if($rows2->nonotaBJFK == $temp1)
                  <?php
                    $temps[$index] = $rows2->grandtotalDBJ;
                    $index++;
                  ?>
                  @endif
                @endforeach
                <div class="row">
                  <div class="col m3">Grand Total :</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    <?php
                      $tempsss  = 0;
                      for($i=0; $i< count($temps); $i++){
                        $tempsss += $temps[$i];
                      }
                    ?>
                    {{Form::text('txtgrandtotal', $tempsss, ['id'=>'txtgrandtotal'])}}
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