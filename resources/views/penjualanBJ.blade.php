@extends('layouts.headerAdmin')
<?php
  $getstatus = "AKTIF";

  $pembayaran['TUNAI']        = "TUNAI"; 
  $pembayaran['TRANSFER']     = "TRANSFER";
  $pembayaran['PIUTANG']      = "PIUTANG";  

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
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
                <div class="container float-left">
                  <div class="form-group">
                      <?php
                        $date     = date('Ym');
                        $jum      = $datapenjualanBJ->count() + 1; 
                        $kodejum  = "BJ".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                      ?>
                    <label>Nomor Nota :</label>
                    {{Form::text('txtnonotapenjualanBJ', $kodejum, ['id'=>'txtnonotapenjualanBJ', 'readonly'=>'readonly'])}}
                  </div> 
                </div>
                </div>
                <div class="container float-left">
                  <div class="form-group">
                    <label>Kode Customer :</label>
                    {{ Form::select('txtkodecustomerBJ',$getkodecustomer , null,['id'=>'txtkodecustomerBJ', 'class'=>'validate browser-default','onchange'=>'ubahalamat()']) }}
                  </div> 
                </div>
                <div class="container float-left">
                  <div class="form-group">
                    <label>Nomor Hp Customer :</label>
                    {{Form::text('txtzxc', '', ['id'=>'txtzxc', 'readonly'=>'readonly'])}}
                  </div> 
                </div>
                <div class="container float-left">
                  <div class="form-group">
                    <label>Tanggal Pembelian :</label>
                    {{Form::date('txttglpembelianBJ', date('Y-m-d'), ['id'=>'txttglpembelianBJ','','readonly'=>'readonly'])}}
                  </div> 
                </div>
                <div class="container float-left">
                  <div class="form-group">
                    <label>Status Pembayaran:</label>
                    {{ Form::select('txtstatusBJ',$bayar , null,['id'=>'txtstatusBJ', 'class'=>'validate browser-default','onchange'=>'ubahalamat()']) }}
                  </div> 
                </div>
                <div class="container float-left">
                  <div class="form-group">
                    <label>Jenis Pembayaran:</label>
                    {{ Form::select('txtjenispembayaranBJ', $pembayaran, null, ['id'=>'txtjenispembayaranBJ', 'class'=>'validate browser-default']) }}
                  </div> 
                </div>
                <div class="container float-left">
                  <div class="form-group">
                    <label>Status Pesanan:</label>
                    {{ Form::select('txtstatuspesanBJ', $pesanan, null, ['id'=>'txtstatuspesanBJ', 'class'=>'validate browser-default']) }}
                  </div> 
                </div>
                <div class="container float-left">
                  <div class="form-group">
                    {{Form::submit('Penjualan Barang',['name'=>'btnInsert','id'=>'btnInsert','class'=>'btn btn-Success btn-xl'])}}
                    <input  type='submit' class='btn btn-warning btn-xl' name='btncancels' id='btncancels' value='Cancel'>
                  </div> 
                </div>
            </div>
          </div>
        <div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">
        <a class="btn btn-warning btn-xl" href="{!! url('newpenjualanBJ'); !!}"><i class="large material-icons">shopping_cart</i></a>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
            <tr>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Qty</th>
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
                        <td>{{Form::hidden('txthistoryDBJ'.$temp1, '', ['id'=>'txthistoryDBJ'.$temp1])}}</td>
                    </tr>
                  @endfor
                  @php($tempAJAX = $temp1)
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
          <!-- Tombol Submit -->
          <div class="row">
            <div class=" col m8">
                
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