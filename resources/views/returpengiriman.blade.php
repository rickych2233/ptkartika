@extends('layouts.headerAdmin')
<?php
    $getkode = [];
    $getnama = [];
    $temp1;
    if(session()->get("sessionretur")){
        $cart = session()->get("sessionretur");
        $jum  = count($cart);
        for($j=0; $j < $jum; $j++){
            $temp1 = $cart[$j]['nonotapengirimanB'];
        }
    }
    foreach($detailpengirimanbarang as $rows){
        if($rows->nonotapengirimanB == $temp1){
            $getkode[$rows->kodebarang] = $rows->kodebarang;
        }
    }
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
  {{ Form::open(array('url' => 'savepengirimanbarang')) }}
  <?php
    // dd($temp1);
  ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">

            <div class="row">
                <div class=" col m6"><h5>Retur Pengiriman<a href=""><span></span></a><hr></h5></div>
            </div>

            <!-- Kode Barang -->
            <div class="container float-left">
                <div class="form-group">
                <?php
                $date     = date('Ym');
                $jum      = $detailreturnpengiriman->count() + 1; 
                $kodejum  = "RP".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                ?>
                
                <label>Nomor Nota Retur:</label>
                {{Form::text('txtnomorretur', $kodejum, ['id'=>'txtnomorretur', 'readonly'=>'readonly', 'class'=>'form-control'])}}
                </div> 
            </div>

            <!-- nama Barang -->
            <div class="container float-left">
                <div class="form-group">
                <label>Kode Barang :</label>
                {{ Form::select('txtkodebarang', $getkode, null, ['id'=>'txtkodebarang', 'class'=>'form-control']) }}
                </div> 
            </div>

            <!-- JUmlah Barang Retur-->
            <div class="container float-left">
                <div class="form-group">
                <label>Tanggal Retur:</label>
                {{Form::date('txttglretur', date('Y-m-d'), ['id'=>'txttglretur', 'class'=>'form-control','readonly'=>'readonly'])}}
                </div> 
            </div>

            <!-- JUmlah Barang Retur-->
            <div class="container float-left">
                <div class="form-group">
                <label>Jumlah Barang Retur:</label>
                {{Form::text('txtjumlahbarang', '', ['id'=>'txtjumlahbarang', 'class'=>'form-control'])}}
                </div> 
            </div>

            <!-- Keterangan Barang Retur-->
            <div class="container float-left">
                <div class="form-group">
                <label>Keterangan Barang Retur:</label>
                {{Form::text('txtketerangan', '', ['id'=>'txtketerangan', 'class'=>'form-control'])}}
                {{Form::hidden('txtnonotapengirimanB', $temp1,['id'=>'txtnonotapengirimanB'])}}
                </div> 
            </div>

            <!-- Tombol Submit -->
            <div class="container float-left">
                <div class=" col m6">
                {{Form::submit('Simpan',['name'=>'btnretur','id'=>'btnretur','class'=>'btn btn-success btn-xl'])}}
                <input  type='submit' class='btn btn-warning btn-xl' name='btncancels' id='btncancels' value='Cancel'>
                </div>
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