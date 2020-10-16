@extends('layouts.headerAdmin')
<?php
  $getkodess = [];
  $getnama = [];
  foreach($databarang as $rows){
    $getkode[$rows->kodebarang]   = $rows->namabarang;
    $getstok[$rows->kodebarang]   = $rows->stok;
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
  {{ Form::open(array('url' => 'savepenyesuaianstok')) }}
    <div class="main">
      <div class="row">
        <div class="col m1"></div>
        <div class="col m10">
          <div class="card-panel">
            <div class="row">
              <div class="col m12"><h5>Penyesuaian Stok<a href=""><span></span></a><hr></h5></div>
            </div>
            <!-- Nomor Nota  -->
            <div class="row">
                <div class="col m3">Nomor Nota Penyesuaian Stok :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                <?php
                  $date     = date('Ym');
                  $jum      = $datapenyesuaianstok->count() + 1; 
                  $kodejum  = "PS".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                ?>
                {{Form::text('txtnonotaPS', $kodejum, ['id'=>'txtnonotaPS', 'readonly'=>'readonly'])}}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m3">Nama Barang :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                 {{ Form::select('txtkodebarangSP', $getkode, null, ['id'=>'txtkodebarangSP', 'class'=>'validate browser-default','onchange'=>'ubahstok()']) }}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m3">Stok saat ini :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                  {{Form::text('txtstokskrngPS', '', ['id'=>'txtstokskrngPS','','class'=>'validate','readonly'=>'readonly'])}}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m3">Stok revisi :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtrevisiPS', '', ['id'=>'txtrevisiPS','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Nama Barang -->
            <div class="row">
                <div class="col m3">Keterangan :</div>
            </div>
            <div class="row">
                <div class=" col m6">
                    {{Form::text('txtketeranganPS', '', ['id'=>'txtketeranganPS','','class'=>'validate'])}}
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="row">
                <div class=" col m6">
                  {{Form::submit('Simpan History',['name'=>'btnInsert','id'=>'btnInsert','class'=>'btn waves-light btn-large'])}}
                  <!-- <input  type='submit' class='waves-light btn-large' name='btncancels' id='btncancels' value='Cancel'> -->
                </div>
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
  //AJAX
  var myurl = "<?php echo URL::to('/'); ?>";
  function ubahstok(){
  //  alert(myurl); 
    var kodebarang = $("#txtkodebarangSP").val(); 
    // alert(kodebarang); 
    $.get(myurl + '/getstokbarang', // routing nya bukan function 
    { kodebarang: kodebarang },
      function(result){ //alert(result); 
        var arr = JSON.parse(result); 
        var kal = "";
        for(var i=0; i < arr.length; i++){
          //alert(arr[i].stok);
          kal = arr[i].stok;
          $("#txtstokskrngPS").val(kal);
        }
      }
    );
  }
  
  
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