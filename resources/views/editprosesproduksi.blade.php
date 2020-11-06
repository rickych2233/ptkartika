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
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
            <h4 class="card-title">Proses Produksi</h4>
              <!-- Nomor Nota -->
              @foreach($dataprosesproduksi as $row)
                @if($temp == $row->nonotaPP)
                <div class="container float-left">
                  <div class="form-group">
                    <label>Nomor Nota :</label>
                    {{Form::text('txtupnonoPP', $row->nonotaPP, ['id'=>'txtupnonoPP', 'readonly'=>'readonly','class'=>'form-control'])}}
                  </div> 
                </div>
                <!-- Tanggal Produksi -->
                <div class="container float-left">
                  <div class="form-group">
                    <label>Tanggal Proses Produksi :</label>
                    {{Form::text('txttglupPP', $row->tglPP, ['id'=>'txttglupPP', 'readonly'=>'readonly','class'=>'form-control'])}}
                  </div> 
                </div>
                <!-- Kode Barang -->
                <div class="container float-left">
                  <div class="form-group">
                    <label>Kode Barang :</label>
                    {{Form::text('txtupkodebarangPP', $row->kodebarang, ['id'=>'txtupkodebarangPP','class'=>'form-control'])}}
                  </div> 
                </div>
                <!-- Qty Produksi -->
                <div class="container float-left">
                  <div class="form-group">
                    <label>Qty Proses Produksi :</label>
                    {{Form::text('txtqtyupPP', $row->qtyhasilPP, ['id'=>'txtqtyupPP','class'=>'form-control'])}}
                  </div> 
                </div>
                @endif
              @endforeach
              <!-- Tombol Submit -->
              <div class="container float-left">
                <div class="form-group">
                {{Form::submit('Update',['name'=>'btnupdateDPP','id'=>'btnupdateDPP','class'=>'btn btn-primary btn-sm'])}}
                {{ Form::submit('cancel',['name'=>'btncancels','id'=>'btncancels','class'=>'btn btn-warning btn-sm']) }}
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
        <h4 class="card-title">List Barang</h4>
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('newprosesproduksi'); !!}"><i class="large material-icons">add</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
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
                    <td>{{$rows->kodebarang}}</td>
                    {{Form::hidden('txtupkodebarang'.$temp2, $rows->kodebarang,['id'=>'txtupkodebarang'.$temp2])}}
                    <td>{{Form::text('txtqtyupDPP'.$temp2, $rows->qtyDPP, ['id'=>'txtqtyupDPP'.$temp2])}}</td>
                    <td>{{$rows->hargaDPP}}</td>
                    {{Form::hidden('txtuphargaDPP'.$temp2, $rows->hargaDPP,['id'=>'txtuphargaDPP'.$temp2])}}
                  </tr>
                @endif
              @endforeach
            </table>
            <?php
              session(['nonotaDPP3' => $temp3]);
            ?>
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