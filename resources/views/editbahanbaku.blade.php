@extends('layouts.headerAdmin')
<?php
  $pesan['AKTIF']           = "AKTIF"; 
  $pesan['TIDAK AKTIF']     = "TIDAK AKTIF"; 
  $jenisBB['LUNAS']         = "LUNAS"; 
  $jenisBB['HUTANG']        = "HUTANG"; 
  $temp1;
  $temp2;
  $temp3 = [];
  $idx = 0;
  if(session()->get("sessioneditBB")){
    $cart = session()->get("sessioneditBB");
    $jum  = count($cart);
    for($j=0; $j < $jum; $j++){
      $temp1 = $cart[$j]['nonotapenerimaanBB'];
    }
  }
?>
@section('content')
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepenerimaanBB')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
                <h5>Update Penjualan Barang jadi<a href=""><span></span></a><hr></h5>
                @foreach($datapenerimaanbb as $row)
                  @if($row->nonotapenerimaanBB == $temp1)
                    <!-- Kode Customer -->
                    <div class="row">
                      <div class="col m5">Nomor Nota :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                          {{Form::text('txtupnonotaBB', $row->nonotapenerimaanBB, ['id'=>'txtupnonotaBB', 'readonly'=>'readonly'])}}
                        </div>
                    </div>
                    <!-- Kode Supplier -->
                    <div class="row">
                      <div class="col m5">Kode Supplier :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                          {{Form::text('txtupkodesupplier', $row->kodesupplier, ['id'=>'txtupkodesupplier', 'readonly'=>'readonly'])}}
                        </div>
                    </div>
                    <div class="row">
                  <div class="col m5">Tanggal :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txtuptglpenerimaanBB', $row->tglpenerimaanBB, ['id'=>'txtuptglpenerimaanBB', 'readonly'=>'readonly'])}}
                    </div>
                </div>
                <!-- Status -->
                <div class="row">
                  <div class="col m5">Status :</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    {{ Form::select('txtupstatuspenerimaanBB', $pesan, $row->statuspenerimaanBB, ['id'=>'txtupstatuspenerimaanBB', 'class'=>'validate browser-default']) }}
                  </div>
                </div>
                <!-- Jenis Pembayaran -->
                <div class="row">
                  <div class="col m5">Jenis Pembayaran :</div>
                </div>
                <div class="row">
                  <div class=" col m6">
                    {{ Form::select('txtupjenispembayaranBB', $jenisBB, $row->jenispembayaranBB, ['id'=>'txtupjenispembayaranBB', 'class'=>'validate browser-default']) }}
                  </div>
                </div>
                @endif
        @endforeach
                    <!-- Tombol Submit -->
                    <div class="row">
                      <div class=" col m8">
                      {{Form::submit('Update',['name'=>'btnupdateDPBB','id'=>'btnupdateDPBB','class'=>'btn waves-light btn-medium'])}}
                      {{ Form::submit('cancel',['name'=>'btncancels','id'=>'btncancels','class'=>'btn waves-light btn-medium red']) }}
                      </div>
                </div>
              </div>
            </div>
          </div>
        <div>
      </div>
    </div>
  </div>
          
        <div class="col m8 offset-m2">
          <div class="card-panel">
            <div class="row">
              <table border="1">
                <tr>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Qty Penerimaan</th>
                  <th>Qty Pemesanan</th>
                </tr>
              @foreach($datadetailpenerimaanbb as $rows)
                @if($rows->nonotapenerimaanBB == $temp1)
                  <tr>
                    @php($temp2 = $rows->nonotaDPBB)
                    <?php
                      $temp3[$idx] = $temp2;
                      $idx++;
                      // dd($temp3);
                    ?>
                    {{Form::hidden('txtupnonotaDPBB'.$temp2, $rows->nonotaDPBB, ['id'=>'txtupnonotaDPBB'.$temp2])}}
                    <td>{{Form::text('txtupnamabarangDPBB'.$temp2, $rows->namabarangDPBB, ['id'=>'txtupnamabarangDPBB'.$temp2, 'readonly'=>'readonly',''])}}</td>
                    <td>{{Form::text('txtupsatuanDPBB'.$temp2, $rows->satuaanDPBB, ['id'=>'txtupsatuanDPBB'.$temp2, 'readonly'=>'readonly',''])}}</td>
                    <td>{{Form::text('txtuphargaDPBB'.$temp2, $rows->hargaDPBB, ['id'=>'txtuphargaDPBB'.$temp2, 'readonly'=>'readonly',''])}}</td>
                    <td>{{Form::text('txtupqtypenerimaanBB'.$temp2, $rows->qtypenerimaanBB, ['id'=>'txtupqtypenerimaanBB'.$temp2])}}</td>
                    <td>{{Form::text('txtupqtypemesananBB'.$temp2, $rows->qtypemesananBB, ['id'=>'txtupqtypemesananBB'.$temp2])}}</td>
                  </tr> 
                @endif 
              @endforeach
            </div>
            <?php
                session(['editDPBB' => $temp3]);
              ?>
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