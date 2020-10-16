@extends('layouts.headerAdmin')
<?php
  $getstatus = "AKTIF";

  $pembayaran['LUNAS']        = "LUNAS"; 
  $pembayaran['HUTANG']       = "HUTANG";  

  $getkodesupplier = [];
  foreach($datasupplier as $rows){
    $getkodesupplier[$rows->kodesupplier] = $rows->namasupplier;
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
  {{ Form::open(array('url' => 'savetfpembelian')) }}
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
                        $date = date('Ym');
                        $jum      = $datatfpembelian->count() + 1; 
                        $kodejum  = "PS".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                      ?>
                      {{Form::text('txtnonotaTFPembelian', $kodejum, ['id'=>'txtnonotaTFPembelian', 'readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="row">
                  <div class="col m3">Kode Supplier :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtkodesupplierTF',$getkodesupplier , null,['id'=>'txtkodesupplierTF', 'class'=>'validate browser-default','onchange'=>'ubahalamat()']) }}
                    </div>
                </div>
                <div class="row">
                  <div class="col m6">Nomor Supplier :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txtnomorhpsupplierTF', '', ['id'=>'txtnomorhpsupplierTF','','class'=>'validate','readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="row">
                  <div class="col m6">Alamat Supplier :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txtalamatsupplierTF', '', ['id'=>'txtalamatsupplierTF','','class'=>'validate','readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="row">
                    <div class=" col m8">
                      {{Form::submit('Proses Produksi',['name'=>'btnInsert','id'=>'btnInsert','class'=>'btn waves-light btn-medium'])}}
                      <input  type='submit' class='btn waves-light btn-medium' name='btncancels' id='btncancels' value='Cancel'>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col m7">
            <div class="card-panel">
              <div class="row">
              <div class="row">
                  <div class="col m4">Tanggal Pembelian :</div>
                </div>
                <div class="row">
                    <div class=" col m6">   
                      {{Form::date('txttglpembelianTF', date('Y-m-d'), ['id'=>'txttglpembelianTF','','readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::hidden('txtstatusTF', $getstatus, ['id'=>'txtstatusTF','','class'=>'validate'])}}
                    </div>
                </div>
                <div class="row">
                  <div class="col m6">Jenis Pembayaran :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{ Form::select('txtjenispembayaranTF', $pembayaran, null, ['id'=>'txtjenispembayaranTF', 'class'=>'validate browser-default']) }}
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="center col m7">
            <div class="card-panel">
              <div class="row">
                <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newtfpembelian'); !!}"><i class="large material-icons">shopping_cart</i></a>
                <table border="1">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>harga</th>
                    <th>Action</th>
                    <th>Grand Total</th>
                  </tr>
                  @if(session()->get("cartDPS")) 
                    @php($cart = session()->get("cartDPS"))
                    @php($jum  = count($cart))
                    <input name="somedataasd" type="hidden" value="<?php echo ($jum); ?>" >
                    @for($j=0; $j < $jum; $j++)
                      <tr>
                        @php($temp1 = $cart[$j]['kodebarang'])
                        @php($temp2 = $cart[$j]['harga'])
                        <input name="txtbarangbakuDTFPembelian" id="txtbarangbakuDTFPembelian" type="hidden" value="<?php echo ($temp1); ?>" >
                        <td>{{$cart[$j]['namabarang']}}</td>
                        <td>{{$cart[$j]['satuan']}}</td>
                        <td>{{$cart[$j]['harga']}}</td>
                        {{Form::hidden('txthargaDPP'.$temp1, $cart[$j]['harga'],['id'=>'txthargaDPP'.$temp1])}}
                        <td>{{Form::text('txtqtyDTFPembelian'.$temp1, '', ['id'=>'txtqtyDTFPembelian'.$temp1,'','class'=>'col s3', '','onkeyup'=>"penambahan('$temp1')"])}}</td>
                        <td>{{Form::text('txtgrandtotalDTF'.$temp1, '', ['id'=>'txtgrandtotalDTF'.$temp1,'','class'=>'col s3','readonly'=>'readonly'])}}</td>
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
              <div class=" col m6">
                
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
  //AJAX
  var myurl = "<?php echo URL::to('/'); ?>";
  function ubahalamat(){
    // alert(myurl);
    var kodesupplier = $("#txtkodesupplierTF").val();
    // alert(kodesupplier);
    $.get(myurl + '/getkodesupplier',
    { kodesupplier: kodesupplier  },
      function(result){ //alert(result);
        var arr = JSON.parse(result);
        var kal1 = "";
        var kal2 = "";
        var kal3 = "";
        for(var i=0; i < arr.length; i++){
          kal1 = arr[i].nomorhpsupplier;
          kal2 = arr[i].alamatsupplier;
          kal3 = arr[i].statussupplier;
          $("#txtnomorhpsupplierTF").val(kal1);
          $("#txtalamatsupplierTF").val(kal2);
          $("#txtsstatussupplierTF").val(kal3);
        }
      }
    );
  }

  function penambahan(kodebarang){
    //alert(myurl);
    //alert(kodebarang);
    var qty   = $("#txtqtyDTFPembelian" + kodebarang).val();
    var hrg   = $("#txthargaDPP" + kodebarang).val();
    //alert(hrg);
    var hasil = hrg * qty;
    $("#txtgrandtotalDTF" + kodebarang).val(hasil);
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