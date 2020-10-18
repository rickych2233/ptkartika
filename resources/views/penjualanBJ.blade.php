@extends('layouts.headerAdmin')
<?php
  $getstatus = "AKTIF";

  $pembayaran['TUNAI']        = "TUNAI"; 
  $pembayaran['TRANSFER']     = "TRANSFER";
  $pembayaran['PIUTANG']      = "PIUTANG";  

  $bayar['LUNAS']     = "LUNAS";
  $bayar['TIDAK']     = "TIDAK";

  $pesanan['PESANAN']     = "PESANAN";

  $pesanandbj    = "PESANAN";

  $getkodesupplier = [];
  foreach($datacustomer as $rows){
    $getkodecustomer[$rows->kodecustomer] = $rows->namatoko;
  }
  $tempAJAX = [];
?>
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
  {{ Form::open(array('url' => 'savepenjualanBJ')) }}
    <div class="main">
      <div class="row">
          <div class="col m5">
            <div class="card-panel">
              <div class="row">
                <div class="row">
                  <div class="col m3">Nomor Nota :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      <?php
                        $date     = date('Ym');
                        $jum      = $datapenjualanBJ->count() + 1; 
                        $kodejum  = "BJ".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                      ?>
                      {{Form::text('txtnonotapenjualanBJ', $kodejum, ['id'=>'txtnonotapenjualanBJ', 'readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="row">
                  <div class="col m3">Kode Customer :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtkodecustomerBJ',$getkodecustomer , null,['id'=>'txtkodecustomerBJ', 'class'=>'validate browser-default','onchange'=>'ubahalamat()']) }}
                    </div>
                </div>
                <div class="row">
                  <div class="col m5">Nomor Hp Customer :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txtzxc', '', ['id'=>'txtzxc', 'readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="row">
                  <div class="col m4">Tanggal Pembelian :</div>
                </div>
                <div class="row">
                    <div class=" col m6">   
                      {{Form::date('txttglpembelianBJ', date('Y-m-d'), ['id'=>'txttglpembelianBJ','','readonly'=>'readonly'])}}
                    </div>
                </div>
                <br>
              </div>
            </div>
          </div>
          <div class="col m5">
            <div class="card-panel">
              <div class="row">
                <div class="row">
                  <div class="col m5">Status Pembayaran :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtstatusBJ',$bayar , null,['id'=>'txtstatusBJ', 'class'=>'validate browser-default','onchange'=>'ubahalamat()']) }}
                    </div>
                </div>
                <div class="row">
                  <div class="col m6">Jenis Pembayaran :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtjenispembayaranBJ', $pembayaran, null, ['id'=>'txtjenispembayaranBJ', 'class'=>'validate browser-default']) }}
                    </div>
                </div>
                <div class="row">
                  <div class="col m6">Status Pesanan :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtstatuspesanBJ', $pesanan, null, ['id'=>'txtstatuspesanBJ', 'class'=>'validate browser-default']) }}
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="center col m9">
            <div class="card-panel">
              <div class="row">
                <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newpenjualanBJ'); !!}"><i class="large material-icons">shopping_cart</i></a>
                <table border="1">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>harga</th>
                    <th>Action</th>
                    <th>Grand Total</th>
                    <th>Status</th>
                  </tr>
                    @if(session()->get("penjualanBJ")) 
                        @php($cart = session()->get("penjualanBJ"))
                        @php($jum  = count($cart))
                        <input name="somed" type="hidden" value="<?php echo ($jum); ?>" >
                        @for($j=0; $j < $jum; $j++)
                            <tr>
                                @php($temp1 = $cart[$j]['kodebarang'])
                                @php($temp2 = $cart[$j]['harga'])
                                <input name="txtpenjualanBJ" id="txtpenjualanBJ" type="hidden" value="<?php echo ($temp1); ?>" >
                                <td>{{$cart[$j]['namabarang']}}</td>
                                <td>{{$cart[$j]['satuan']}}</td>
                                <td>{{$cart[$j]['harga']}}</td>
                                    {{Form::hidden('txthargaDBJ'.$temp1, $cart[$j]['harga'],['id'=>'txthargaDBJ'.$temp1])}}
                                <td>{{Form::text('txtqtyDBJ'.$temp1, '', ['id'=>'txtqtyDBJ'.$temp1,'','class'=>'col s3', '','onkeyup'=>"penambahan('$temp1')"])}}</td>
                                <td>{{Form::text('txtgrandtotalDBJ'.$temp1, '', ['id'=>'txtgrandtotalDBJ'.$temp1,'','class'=>'col s3','readonly'=>'readonly'])}}</td>
                                <td>{{Form::text('txtstatusDBJ'.$temp1, $pesanandbj, ['id'=>'txtstatusDBJ'.$temp1, 'readonly'=>'readonly'])}}</td>
                            </tr>
                        @endfor
                        @php($tempAJAX = $temp1)
                    @endif
                </table>
              </div>
            </div>
          </div>
          <!-- Tombol Submit -->
          <div class="row">
            <div class=" col m8">
                {{Form::submit('Penjualan Barang',['name'=>'btnInsert','id'=>'btnInsert','class'=>'btn waves-light btn-medium'])}}
                <input  type='submit' class='btn waves-light btn-medium' name='btncancels' id='btncancels' value='Cancel'>
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
  function penambahan(kodebarang){
    //alert(myurl);
    alert(kodebarang);
    var qty   = $("#txtqtyDBJ" + kodebarang).val();
    var hrg   = $("#txthargaDBJ" + kodebarang).val();
    var hasil = hrg * qty;
    $("#txtgrandtotalDBJ" + kodebarang).val(hasil);
  }
  
  //AJAX
  var myurl = "<?php echo URL::to('/'); ?>";
  function ubahalamat(){
    // alert(myurl);
    var kodecustomer = $("#txtkodecustomerBJ").val();
    // alert(kodecustomer);
    $.get(myurl + '/getvalkodecustomer',
    { kodecustomer: kodecustomer  },
      function(result){ 
        // alert(result);
        var arr = JSON.parse(result);
        var kal1 = "";
        for(var i=0; i < arr.length; i++){
          kal1 = arr[i].hp;
          $("#txtzxc").val(kal1);
        }
      }
    );
  }

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