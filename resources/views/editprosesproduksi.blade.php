@extends('layouts.headerAdmin')
<?php
  $temp; 
  $temp3 = []; 
  $index = 0;
  if(session()->get("sessioneditPP")){
    $cart = session()->get("sessioneditPP");
    // dd($cart);
    $jum  = count($cart);
    for($j=0; $j < $jum; $j++){
      $temp = $cart[$j]['nonotaPP'];
    }
  }
  $temp2;
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'saveprosesproduksi')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
          <div class="col m5">
            <div class="card-panel ">
              <div class="row">
              <h5>Update Proses Produksi<a href=""><span></span></a><hr></h5>
              <!-- Nomor Nota -->
              @foreach($dataprosesproduksi as $row)
                @if($temp == $row->nonotaPP)
                <div class="row">
                    <div class="col m5">Nomor Nota :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txtupnonoPP', $row->nonotaPP, ['id'=>'txtupnonoPP', 'readonly'=>'readonly'])}}
                    </div>
                </div>
                <!-- Tanggal Produksi -->
                <div class="row">
                    <div class="col m5">Tanggal Proses Produksi :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txttglupPP', $row->tglPP, ['id'=>'txttglupPP', 'readonly'=>'readonly'])}}
                    </div>
                </div>
              </div>
              <!-- Tombol Submit -->
              <div class="row">
                <div class=" col m8">
                {{Form::submit('Update',['name'=>'btnupdateDPP','id'=>'btnupdateDPP','class'=>'btn waves-light btn-medium'])}}
                {{ Form::submit('cancel',['name'=>'btncancels','id'=>'btncancels','class'=>'btn waves-light btn-medium red']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="col m5">
            <div class="card-panel ">
              <div class="row">
                <!-- Kode Barang -->
                <div class="row">
                    <div class="col m5">Kode Barang :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txtupkodebarangPP', $row->kodebarang, ['id'=>'txtupkodebarangPP'])}}
                    </div>
                </div>
                <!-- Qty Produksi -->
                <div class="row">
                    <div class="col m5">Qty Proses Produksi :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txtqtyupPP', $row->qtyhasilPP, ['id'=>'txtqtyupPP'])}}
                    </div>
                </div>
                @endif
              @endforeach
              </div>
            </div>
          </div>
          <div class="col m5 offset-m3">
            <div class="card-panel">
              <div class="row">
                <table border="1">
                  <tr>
                    <th>Kode Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                  </tr>
                  @foreach($datadetailPP as $rows)
                    @if($temp == $rows->nonotaPP)
                      @php($temp2 = $rows->nonotaDPP)
                      <tr>
                        <?php
                          $temp3[$index] = $rows->nonotaDPP;
                          $index++;
                        ?>
                        {{Form::hidden('txtupnonotaDPP'.$temp2, $rows->nonotaDPP,['id'=>'txtupnonotaDPP'.$temp2])}}
                        <td style="width:20%">{{$rows->kodebarang}}</td>
                        {{Form::hidden('txtupkodebarang'.$temp2, $rows->kodebarang,['id'=>'txtupkodebarang'.$temp2])}}
                        <td style="width:20%">{{Form::text('txtqtyupDPP'.$temp2, $rows->qtyDPP, ['id'=>'txtqtyupDPP'.$temp2])}}</td>
                        <td style="width:20%">{{$rows->hargaDPP}}</td>
                        {{Form::hidden('txtuphargaDPP'.$temp2, $rows->hargaDPP,['id'=>'txtuphargaDPP'.$temp2])}}
                      </tr>
                    @endif
                  @endforeach
                </table>
                <?php
                  session(['nonotaDPP3' => $temp3]);
                ?>
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