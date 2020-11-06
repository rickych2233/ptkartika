@extends('layouts.headerAdmin')
<?php
  $temp;
  $temp2;
  $temp3 = [];
  $index = 0;
  if(session()->get("sessioneditTF")){
    $cart = session()->get("sessioneditTF");
    // dd($cart);
    $jum  = count($cart);
    for($j=0; $j < $jum; $j++){
      $temp = $cart[$j]['nonotaTFPembelian'];
    }
  }
  // dd($temp);
?>
@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savetfpembelian')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
                <h5>Update Kategori Barang<a href=""><span></span></a><hr></h5>
                @foreach($datatfpembelian as $row)
                  @if($row->nonotaTFPembelian == $temp)
                  <div class="row">
                    <div class="col m3">Nomor Nota :</div>
                  </div>
                  <div class="row">
                      <div class=" col m6">
                        {{Form::text('txtupnonotaTF', $row->nonotaTFPembelian, ['id'=>'txtupnonotaTF', 'readonly'=>'readonly'])}}
                      </div>
                  </div>
                  <div class="row">
                    <div class="col m3">Bahan Baku :</div>
                  </div>
                  <div class="row">
                      <div class=" col m6">
                        {{Form::text('txtupkodesupplierTF', $row->kodesupplier, ['id'=>'txtupkodesupplierTF'])}}
                      </div>
                  </div>
                  <div class="row">
                      <div class="col m6">Tanggal Pembelian Bahan Baku :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                          {{Form::text('txtuptglpembelianTF', $row->tglpembelianTF, ['id'=>'txtuptglpembelianTF'])}}
                        </div>
                    </div>
                    <div class="row">
                      <div class="col m3">Status:</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                          {{Form::text('txtupstatusTF', $row->statusTF, ['id'=>'txtupstatusTF', 'readonly'=>'readonly'])}}
                        </div>
                    </div>
                    <div class="row">
                      <div class="col m5">Jenis Pembayaran :</div>
                    </div>
                    <div class="row">
                        <div class=" col m6">
                          {{Form::text('txtupjenispembayaranTF', $row->jenispembayaranTF, ['id'=>'txtupjenispembayaranTF'])}}
                        </div>
                    </div>
              <!-- Tombol Submit -->
              @endif
                @endforeach
              <div class="row">
                <div class=" col m8">
                {{Form::submit('Update',['name'=>'btnupdateTF','id'=>'btnupdateTF','class'=>'btn waves-light btn-medium'])}}
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
          <div class="col m7 offset-m3">
            <div class="card-panel">
              <div class="row">
                <table border="1">
                  <tr>
                    <th>Bahan Baku</th>
                    <th>Harga Pembelian</th>
                    <th>Qty Bahan Baku</th>
                    <th>Grand Total</th>
                  </tr>
                  @foreach($datadetailTF as $rows)
                    @if($rows->nonotaTFPembelian == $temp)
                    @php($temp2 = $rows->nonotaDTFPembelian)
                    <tr>
                      <?php
                        $temp3[$index] = $rows->nonotaDTFPembelian;
                        $index++;
                      ?>
                      {{Form::hidden('txtupnonotaDTF'.$temp2, $rows->nonotaDTFPembelian,['id'=>'txtupnonotaDTF'.$temp2])}} 
                      
                      <td>{{$rows->kodebarang}}</td>
                      {{Form::hidden('txtupbarangbakuDTF'.$temp2, $rows->kodebarang,['id'=>'txtupbarangbakuDTF'.$temp2])}}
                      
                      <td>{{$rows->hargaDTFPembelian}}</td>
                      {{Form::hidden('txthargaDTF'.$temp2, $rows->hargaDTFPembelian,['id'=>'txthargaDTF'.$temp2])}} 
                      
                      <td>{{Form::text('txtupqtyDTF'.$temp2, $rows->qtyDTFPembelian, ['id'=>'txtupqtyDTF'.$temp2,'onkeyup'=>"penambahan($temp2)"])}}</td>
                      <td>{{Form::text('txtupgrandDTF'.$temp2, $rows->grandtotalDTF, ['id'=>'txtupgrandDTF'.$temp2])}}</td>
                    </tr>
                    @endif
                  @endforeach
                </table>
                <?php
                  session(['notaDTF' => $temp3]);
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
  function penambahan(kodebarang){
    var hrg   = $("#txthargaDTF" + kodebarang).val();
    var qty   = $("#txtupqtyDTF" + kodebarang).val();
    var hasil = hrg * qty;
    $("#txtupgrandDTF" + kodebarang).val(hasil);
  }

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