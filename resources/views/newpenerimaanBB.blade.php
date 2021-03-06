@extends('layouts.headerAdmin')
<?php
  $pembayaran['LUNAS']     = "LUNAS"; 
  $pembayaran['HUTANG']    = "HUTANG"; 
  $status['AKTIF']          = "AKTIF"; 
  $status['TIDAK AKTIF']    = "TIDAK AKTIF"; 
  $getkode  = [];
  foreach($datasupplier as $rows){
    $getkode[$rows->kodesupplier] = $rows->namasupplier;
  }
  $temp = 0;
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
  {{ Form::open(array('url' => 'savepenerimaanBB')) }}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col m12">Nomor Nota :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                      <?php
                        $date     = date('Ym');
                        $jum      = $datapenerimaanbb->count() + 1; 
                        $kodejum  = "PBB".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                      ?>
                    {{Form::text('nonotapenerimaanBB',$kodejum, ['id'=>'nonotapenerimaanBB', 'readonly'=>'readonly'])}}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m6">Nama Supplier :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                {{ Form::select('txtsupplierpenerimaanBB', $getkode, null, ['id'=>'txtsupplierpenerimaanBB', 'class'=>'validate browser-default']) }}
                </div>
            </div>
            <!-- Kode Barang -->
            <div class="row">
                <div class="col m6">Tanggal Penerimaan :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::date('txttglpenerimaanBB', date('Y-m-d'), ['id'=>'txttglpenerimaanBB','','readonly'=>'readonly'])}}
                </div>
            </div>
            
            <div class="row">
                <div class="col m6">Status :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                {{ Form::select('txtstatuspenerimaanBB', $status, null, ['id'=>'txtstatuspenerimaanBB', 'class'=>'validate browser-default']) }}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m6">Jenis Pembayaran :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                {{ Form::select('txtjenispembayaranBB', $pembayaran, null, ['id'=>'txtjenispembayaranBB', 'class'=>'validate browser-default']) }}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m6">Total Grand:</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{Form::text('txttotalGrand','', ['id'=>'txttotalGrand', 'readonly'=>'readonly'])}}
                </div>
            </div>
            <div class="row">
              <div class=" col m6">
                {{Form::submit('Insert',['name'=>'btnInsertBB','id'=>'btnInsertBB','class'=>'btn waves-light btn-small'])}}
                <input  type='submit' class='waves-light btn-small' name='btncancels' id='btncancels' value='Cancel'>
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
        <a class="waves-effect waves-light btn modal-trigger left" href="{!! url('detailpenerimaanBB'); !!}"><i class="large material-icons">add</i></a>
      </div>
            <table border="1">
              <tr>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Qty Penerimaan</th>
                <th>Qty Pemesanan</th>
              </tr>
              
              @if(session()->get("penerimaanBB")) 
                    @php($cart = session()->get("penerimaanBB"))
                    @php($jum  = count($cart))
                    @php($temp = count($cart))
                    <input name="somedatas" type="hidden" value="<?php echo ($jum); ?>" >
                    @for($j=0; $j < $jum; $j++)
                      <tr>
                        @php($temp1 = $cart[$j]['kodebarang'])
                        @php($temp2 = $cart[$j]['harga'])
                        <input name="txtPBBkodebarang" id="txtPBBkodebarang" type="hidden" value="<?php echo ($temp1); ?>" >
                        <td>{{$cart[$j]['namabarang']}}</td>
                        <td>{{$cart[$j]['satuan']}}</td>
                        <td>{{$cart[$j]['harga']}}</td>
                        {{Form::hidden('txtharga'.$jum,$cart[$j]['harga'], ['id'=>'txtharga'.$j,'','class'=>'validate'])}}
                        <td>{{Form::text('txtqtypenerimaanBB'.$temp1, '', ['id'=>'txtqtypenerimaanBB'.$j,'','class'=>'col s3','onkeyup'=>"penambahan('$jum')"])}}</td>
                        <td>{{Form::text('txtqtypemesananBB'.$temp1, '', ['id'=>'txtqtypemesananBB'.$temp1,'','class'=>'col s3'])}}</td>
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
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.dropdown-trigger').dropdown();
  });
  function penambahan(temp){
    var qty = 0;
    var harga = 0;
    var hasil = 0;
    for(var i=0; i<temp; i++){
      qty   = $("#txtqtypenerimaanBB" + i).val();
      harga = $("#txtharga" + i).val();
      hasil += qty * harga;
    }
    $("#txttotalGrand").val(hasil);
  }

  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>