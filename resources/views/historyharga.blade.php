@extends('layouts.headerAdmin')
<?php
  $getkodess = [];
  $getnama = [];
  foreach($databarang as $rows){
    $getkode[$rows->kodebarang]   = $rows->kodebarang;
    $getnama[$rows->kodebarang]   = $rows->namabarang;
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
  {{ Form::open(array('url' => 'savehistoryharga')) }}
  
  <!-- INI MENU UTAMA-->
    <div class="main">
      <div class="row">
        <div class="col m0"></div>
          <div class="col m5">
            <div class="card-panel">
              <div class="row">
                <h5>History Harga<a href=""><span></span></a><hr></h5>
                  <h7>Nama Barang:{{ Form::select('txtkodebarangHH', $getnama, null, ['id'=>'txtkodebarangHH', 'class'=>'validate browser-default','onchange'=>'ubahbarang()']) }}</h7>
                  <br>
                  <!-- {{Form::submit('View',['name'=>'btnview','id'=>'btnview','class'=>'btn waves-light btn-medium'])}} -->
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
        </div>
        <div class="col m6">
            <div class="card-panel">
              <div class="row">
                
                <div class="row">
                  <div class="col m2">ID History :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      <?php
                          $jum     = $datahistoryharga->count() + 1; 
                          $kodebrg = "H".str_pad($jum, 3, "0",STR_PAD_LEFT);
                      ?>
                      {{Form::text('txtidhistoryHH', $kodebrg, ['id'=>'txtidhistoryHH', 'readonly'=>'readonly'])}}
                    </div>
                </div>  
            
                <div class="row">
                  <div class="col m3">Tanggal History:</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      @php($date = date('yy-m-d'))
                      {{Form::text('txttanggalhistoryHH', $date, ['id'=>'txttanggalHH','',''])}}
                    </div>
                </div>

                <div class="row">
                  <div class="col m3">Tanggal Berlaku:</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::date('txttanggalberlakuHH', '', ['id'=>'txttanggalberlakuHH','',''])}}
                    </div>
                </div>

                <div class="row">
                  <div class="col m3">Harga Jual :</div>
                </div>
                <div class="row">
                    <div class=" col m6">
                      {{Form::text('txthargajualHH', '', ['id'=>'txthargajual', 'placeholder'=>''])}}
                    </div>
                </div>
                {{Form::submit('Simpan',['name'=>'btnsimpanHH','id'=>'btnsimpanHH','class'=>'btn waves-light btn-medium'])}}
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
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


  //materialize

  $(document).ready(function(){
    $('.datepicker').datepicker();
    $('.sidenav').sidenav();
    $('.modal').modal();
    ubahbarang();
  });
  
  
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });
</script>