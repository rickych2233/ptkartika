@extends('layouts.headerAdmin')
<?php
    $getstatus['AKTIF']     = "AKTIF"; 
    $getstatus['TIDAK AKTIF'] = "TIDAK AKTIF"; 

    foreach($datauser as $rows){
        if($rows->role == "SALES PENJUALAN")$getkode[$rows->username]   = $rows->username;
    }

    foreach($datacustomer as $rows1){
        $getcust[$rows1->kodecustomer]   = $rows1->namatoko;
    }
?>


@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savepengirimanbarang')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col m12"><h5>List Pengiriman<a href=""><span></span></a><hr></h5></div>
              </div>
                <!-- Kode Barang -->
                <div class="container float-left">
                  <div class="form-group">
                    <?php
                        $date     = date('Ym');
                        $jum      = $datapengirimanbarang->count() + 1; 
                        $kodejum  = "PE".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                    ?>
                    <label>Nomor Nota :</label>
                    {{Form::text('txtnonotapengirimanB',$kodejum, ['id'=>'txtnonotapengirimanB', 'readonly'=>'readonly', 'class'=>'form-control'])}}
                  </div>
                </div>
<<<<<<< HEAD
                <div class="container float-left">
=======
                <div class="container">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
                  <div class="form-group">
                    <label>Tanggal Pengiriman :</label>
                    {{Form::date('txttglpengirimanB', date('Y-m-d'), ['id'=>'txttglpengirimanB', 'class'=>'form-control'])}}
                  </div>
                </div>
<<<<<<< HEAD
                <div class="container float-left">
=======
                <div class="container">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
                  <div class="form-group">
                    <label>Nama Toko :</label>
                    {{ Form::select('txtkodecustomer', $getcust, null, ['id'=>'txtkodecustomer', 'class'=>'form-control']) }}
                  </div>
                </div>
<<<<<<< HEAD
                <div class="container float-left">
=======
                <div class="container">
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
                  <div class="form-group">
                    <label>Nama Sales Penjualan :</label>
                    {{ Form::select('txtusername', $getkode, null, ['id'=>'txtusername', 'class'=>'form-control']) }}
                  </div>
                </div>
                 <!-- Tombol Submit -->
                <div class="container float-left">
                    <div class=" col m6">
                        {{Form::submit('Pengiriman',['name'=>'btninsert','id'=>'btninsert','class'=>'btn waves-light btn-medium'])}}
                        <input  type='submit' class='btn waves-light btn-medium' name='btncancels' id='btncancels' value='Cancel'>
                    </div>
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
        <div class="card-header">
            <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newbarangbuatpengiriman'); !!}"><i class="large material-icons">shopping_cart</i></a>
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok Sekarang</th>
                <th>Stok DiAmbil</th>
              </tr>
              @if(session()->get("cartpe")) 
                  @php($cart = session()->get("cartpe"))
                  @php($jum  = count($cart))
                  <input name="somed" id="somed" type="hidden" value="<?php echo ($jum); ?>" >
                  @for($j=0; $j < $jum; $j++)
                      <tr>
                          @php($temp1 = $cart[$j]['kodebarang'])
                          @php($temp2 = $cart[$j]['harga'])
                          <input name="somedataasd" id="somedataasd" type="hidden" value="<?php echo ($temp1); ?>" >
                          {{Form::hidden('txtnonotadpengirimanB', '', ['id'=>'txtnonotadpengirimanB'])}}
                          {{Form::hidden('txtkodebarang'.$temp1, $cart[$j]['kodebarang'], ['id'=>'txtkodebarang'.$temp1])}}
                          <td>{{$cart[$j]['namabarang']}}</td>
                          <td>{{$cart[$j]['harga']}}</td>
                          <td>{{$cart[$j]['stok']}}</td>
                          {{Form::hidden('txtstoksekarang'.$temp1, $cart[$j]['stok'], ['id'=>'txtstoksekarang'.$temp1])}}
                          <td>{{Form::text('txtjumlahbarang'.$temp1, '', ['id'=>'txtjumlahbarang'.$temp1,'onkeyup'=>"penambahan('$temp1')"])}}</td>
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
  {{ Form::close() }}
  @endsection
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });
  function penambahan(kodebarang){
    var qtytertera      = $("#txtjumlahbarang" + kodebarang).val();
    var qtymengisi      = $("#txtstoksekarang" + kodebarang).val();
    var temptertera = parseInt(qtytertera,10);
    var tempmengisi = parseInt(qtymengisi,10);
    if(qtymengisi !== null  && tempmengisi < temptertera){
      alert("Masih Kosong atau yang diisi lebih besar");
      $('#btninsert').prop('disabled', true);
    }else{
      $('#btninsert').prop('disabled', false);
    }
  }
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>