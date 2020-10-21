@extends('layouts.headerAdmin')
<?php
  $getkodess = [];
  $getnama = [];
  foreach($databarang as $rows){
    $getkodess[$rows->kodebarang]   = $rows->namabarang;
  }
?>

@section('content')
  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'saveprosesproduksi')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
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
                        $jum      = $dataprosesproduksi->count() + 1; 
                        $kodejum  = "PP".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                      ?>
                      {{Form::text('txtnonotaPP', $kodejum, ['id'=>'txtnonotaPP', 'readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="row">
                  <div class="col m3">Tanggal :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::date('txttglPP', date('Y-m-d'), ['id'=>'txttglPP','','readonly'=>'readonly'])}}
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col m5">
            <div class="card-panel">
              <div class="row">
              <div class="row">
                  <div class="col m3">Nama Barang :</div>
                </div>
                <div class="row">
                    <div class=" col m6">   
                      {{ Form::select('txtbarangjadiPP', $getkodess, null, ['id'=>'txtbarangjadiPP', 'class'=>'validate browser-default']) }}
                    </div>
                </div>
                <div class="row">
                  <div class="col m3">Qty Hasil :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                        {{Form::text('txtqtyhasilPP', '', ['id'=>'txtqtyhasilPP','','class'=>'validate'])}}
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col m8 offset-m2">
            <div class="card-panel">
              <div class="row">
                <!-- {{Form::submit('+',['name'=>'btnInsertPP','id'=>'btnInsertPP','class'=>'btn waves-light btn-medium','onclick'=>'tambahProsesProduksi'])}} -->
                <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newprosesproduksi'); !!}"><i class="large material-icons">add</i></a>
                <table border="1">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    @if(session()->get("cart")) 
                      @php($cart = session()->get("cart"))
                      @php($jum  = count($cart))
                      <input name="somedata" type="hidden" value="<?php echo ($jum); ?>" >
                      @for($j=0; $j < $jum; $j++)
                        <tr>
                          @php($temp1 = $cart[$j]['kodebarang'])
                          @php($temp2 = $cart[$j]['harga'])
                          <input name="txtbarangbakuDPP" type="hidden" value="<?php echo ($temp1); ?>" >
                          <td>{{$cart[$j]['namabarang']}}</td>
                          <td>{{$cart[$j]['satuan']}}</td>
                          <td>{{$cart[$j]['stok']}}</td>
                          {{Form::hidden('txtstokasd'.$temp1, $cart[$j]['stok'],['id'=>'txtstokasd'.$temp1])}}
                          <td>{{Form::text('txtqtyDPP'.$temp1, '', ['id'=>'txtqtyDPP'.$temp1,'class'=>'col s3','onkeyup'=>"penambahan('$temp1')"])}}</td>
                          <input name="txthargaDPP" type="hidden" value="<?php echo ($temp2); ?>" >
                        </tr>
                      @endfor
                    @endif  
                </table>
              </div>
            </div>
          </div>
          <!-- Tombol Submit -->
          <div class="row">
              <div class=" col m6 offset-m2">
                {{Form::submit('Proses Produksi',['name'=>'btnInsertPP','id'=>'btnInsertPP','class'=>'btn waves-light btn-medium'])}}
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
  var myurl = "<?php echo URL::to('/'); ?>";
  //AJAX
  function penambahan(kodebarang){
    var qtytertera      = $("#txtstokasd" + kodebarang).val();
    var qtymengisi      = $("#txtqtyDPP" + kodebarang).val();
    var temptertera = parseInt(qtytertera,10);
    var tempmengisi = parseInt(qtymengisi,10);
    if(qtymengisi !== null  && tempmengisi > temptertera){
      alert("Masih Kosong atau yang diisi lebih besar");
      $('#btnInsertPP').prop('disabled', true);
    }else{
      $('#btnInsertPP').prop('disabled', false);
    }
  }
  //Materialize
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });
  //$('.dropdown-trigger').dropdown();
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>