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
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col m12"><h5>Proses Produksi<a href=""><span></span></a><hr></h5></div>
              </div>
            <!-- Nomor nota -->
<<<<<<< HEAD
            <div class="container float-left">
=======
            <div class="container">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
              <div class="form-group">
                <?php
                  $date = date('Ym');
                  $jum      = $dataprosesproduksi->count() + 1; 
                  $kodejum  = "PP".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                ?>
                <label>Nomor Nota :</label>
                {{Form::text('txtnonotaPP', $kodejum, ['id'=>'txtnonotaPP', 'class'=>'form-control','readonly'=>'readonly'])}}
              </div> 
            </div>
            <!-- Tanggal -->
<<<<<<< HEAD
            <div class="container float-left">
=======
            <div class="container">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
                <div class="form-group">
                  <label>Tanggal :</label>
                  {{Form::date('txttglPP', date('Y-m-d'), ['id'=>'txttglPP', 'class'=>'form-control','readonly'=>'readonly'])}}
                </div> 
              </div>
            <!-- Nama Barang -->
<<<<<<< HEAD
            <div class="container float-left">
=======
            <div class="container">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
              <div class="form-group">
                <label>Nama Barang :</label>
                {{ Form::select('txtbarangjadiPP', $getkodess, null, ['id'=>'txtbarangjadiPP', 'class'=>'form-control']) }}
              </div>
            </div>
            <!-- Qty -->
<<<<<<< HEAD
            <div class="container float-left">
=======
            <div class="container">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
              <div class="form-group">
                <label>Qty Hasil:</label>
                {{Form::text('txtqtyhasilPP', '', ['id'=>'txtqtyhasilPP','','class'=>'form-control'])}}
              </div> 
            </div>
            <!-- Tombol Submit -->
<<<<<<< HEAD
            <div class="container float-left">
=======
            <div class="row">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
              <div class=" col m6">
                {{Form::submit('Insert',['name'=>'btnInsertPP','id'=>'btnInsertPP','class'=>'btn btn-success btn-xl'])}}
                <input  type='submit' class='btn btn-warning btn-xl' name='btncancels' id='btncancels' value='Cancel'>
              </div>
            </div>
          </div>
        <div>
      </div>
    </div>
  </div>

<<<<<<< HEAD
<div class="row">
=======
  <div class="row">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">List Barang</h4>
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newprosesproduksi'); !!}"><i class="large material-icons">add</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
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
                    <td>{{Form::text('txtqtyDPP'.$temp1, '', ['id'=>'txtqtyDPP'.$temp1,'class'=>'form-control','onkeyup'=>"penambahan('$temp1')"])}}</td>
                    <input name="txthargaDPP" type="hidden" value="<?php echo ($temp2); ?>" >
                  </tr>
                @endfor
              @endif 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}
@endsection
  
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
  $('.dropdown-trigger').dropdown();
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>