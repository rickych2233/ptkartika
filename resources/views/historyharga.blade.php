@extends('layouts.headerAdmin')
<?php
  $getkodess = [];
  $getnama = [];
  foreach($databarang as $rows){
    $getkode[$rows->kodebarang]   = $rows->kodebarang;
    $getnama[$rows->kodebarang]   = $rows->namabarang;
  }
?>
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
@section('content')
{{ Form::open(array('url' => 'savehistoryharga')) }}
  <!-- ======================================================= -->
  <!-- INI MENU UTAMA-->
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">History Harga</h4>
      </div>

      <div class="container">
        <div class="form-group">
          <label>Nama Barang: </label>
          {{ Form::select('txtkodebarangHH', $getnama, null, ['id'=>'txtkodebarangHH', 'class'=>'form-control','onchange'=>'ubahbarang()']) }}
        </div> 
      </div>

      <div class="card-body">
        <div class="container">
          <?php
              $jum     = $datahistoryharga->count() + 1; 
              $kodebrg = "H".str_pad($jum, 3, "0",STR_PAD_LEFT);
          ?>
          <div class="form-group">
            <label>ID History :</label>
            {{Form::text('txtidhistoryHH', $kodebrg, ['id'=>'txtidhistoryHH', 'class'=>'form-control','readonly'=>'readonly'])}}
          </div> 
        </div>

        <div class="container">
          <div class="form-group">
            <label>Tanggal History: </label>
            @php($date = date('yy-m-d'))
            {{Form::text('txttanggalhistoryHH', $date, ['id'=>'txttanggalHH','class'=>'form-control',''])}}
          </div> 
        </div>

        <div class="container">
          <div class="form-group">
            <label>Harga :</label>
            {{Form::text('txthargajualHH', '', ['id'=>'txthargajual', 'class'=>'form-control',''])}}
          </div> 
        </div>

        <div class="container">
          <div class="form-group">
            <label>Tanggal Berlaku: </label>
            {{Form::date('txttanggalberlakuHH', '', ['id'=>'txttanggalberlakuHH','class'=>'form-control',''])}}
          </div> 
        </div>
        <br>
        <div class="container">
          <div class="row">
            <table border="1">
              <thead>
                <tr>
                  <th>Tanggal History</th>
                  <th>Tanggal Berlaku</th>
                  <th>Harga Jual</th>
                </tr>
              </thead>
              <tbody id="tabelHistory">
              </tbody>
            </table>
          </div>
        </div>
        <br>
        {{Form::submit('Simpan',['name'=>'btnsimpanHH','id'=>'btnsimpanHH','class'=>'btn waves-light btn-medium'])}}
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}
@endsection

<script>
  function updatedata(username,email,password,nama,alamat,telepon,handphone,noktp,role,status){
    $('#txtupusername').val(username);
    $('#txtupemail').val(email);
    $('#txtuppassword').val(password);
    $('#txtupnama').val(nama);
    $('#txtupalamat').val(alamat);
    $('#txtuptelepon').val(telepon);
    $('#txtuphandphone').val(handphone);
    $('#txtupktp').val(noktp);
    $('#txtuprole').val(role);
    $('#txtupstatus').val(status);
  }
  
  //AJAX
  var myurl = "<?php echo URL::to('/'); ?>";
  function ubahbarang(){
    var kodebarang = $("#txtkodebarangHH").val(); 
    $.get(myurl + '/gethargabarang', // routing nya bukan function 
    { kodebarang: kodebarang },
      function(result){ 
        var arr = JSON.parse(result);
        var kal = "";
        for(var i=0; i < arr.length; i++)
        {
          // alert(i);
          // alert(arr[i].kodebarang);
          kal = kal + "<tr>";
            kal = kal + "<td>" + arr[i].tanggalhistory + "</td>";
            kal = kal + "<td>" + arr[i].tanggalberlaku + "</td>";
            kal = kal + "<td>" + arr[i].hargajual + "</td>";
          kal = kal + "</tr>";
        }
        $("#tabelHistory").html(kal)
      }
    );
  }

  $(document).ready(function(){
    ubahbarang();
  });
</script>