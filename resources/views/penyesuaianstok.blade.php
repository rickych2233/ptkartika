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
  <div class="row">
    <div class="col-md-12">
      <div class="card">
<<<<<<< HEAD
        <div class="card-body">

          <div class="row">
              <div class=" col m6"><h5>Penyesuaian Stok<a href=""><span></span></a><hr></h5></div>
          </div>

          <!-- Kode Barang -->
          <div class="container float-left">
            <div class="form-group">
            <?php
              $date     = date('Ym');
              $jum      = $datapenyesuaianstok->count() + 1; 
              $kodejum  = "PS".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
            ?>
            <label>Nomor Nota Penyesuaian Stok :</label>
            {{Form::text('txtnonotaPS', $kodejum, ['id'=>'txtnonotaPS', 'readonly'=>'readonly', 'class'=>'form-control'])}}
            </div> 
          </div>

          <!-- Nama Barang -->
          <div class="container float-left">
            <div class="form-group">
            <label>Nama Barang :</label>
            {{ Form::select('txtkodebarangSP', $getkode, null, ['id'=>'txtkodebarangSP', 'class'=>'form-control','onchange'=>'ubahstok()']) }}
            </div> 
          </div>

          <!-- Kategori Barang -->
          <div class="container float-left">
            <div class="form-group">
            <label>Stok saat ini :</label>
            {{Form::text('txtstokskrngPS', '', ['id'=>'txtstokskrngPS','','class'=>'form-control','readonly'=>'readonly'])}}
            </div> 
          </div>

          <!-- Satuan Barang -->
          <div class="container float-left">
            <div class="form-group">
              <label>Stok revisi :</label>
              {{Form::text('txtrevisiPS', '', ['id'=>'txtrevisiPS','','class'=>'form-control'])}}
            </div> 
          </div>

          <!-- Stok Barang -->
          <div class="container float-left">
            <div class="form-group">
              <label>Keterangan :</label>
              {{Form::text('txtketeranganPS', '', ['id'=>'txtketeranganPS','','class'=>'form-control'])}}
            </div>
          </div>


          <!-- Tombol Submit -->
          <div class="container float-left">
            <div class=" col m6">
              {{Form::submit('Simpan History',['name'=>'btnInsert','id'=>'btnInsert','class'=>'btn btn-success btn-xl'])}}
              <input  type='submit' class='btn btn-warning btn-xl' name='btncancels' id='btncancels' value='Cancel'>
=======
        <div class="card-header">
          </div>
            <div class="card-body">
              <div class="row">
                  <div class=" col m6"><h5>Penyesuaian Stok<a href=""><span></span></a><hr></h5></div>
              </div>
              <!-- Kode Barang -->
              <div class="container">
                <div class="form-group">
                <?php
                  $date     = date('Ym');
                  $jum      = $datapenyesuaianstok->count() + 1; 
                  $kodejum  = "PS".$date.str_pad($jum, 3, "0",STR_PAD_LEFT);
                ?>
                <label>Nomor Nota Penyesuaian Stok :</label>
                {{Form::text('txtnonotaPS', $kodejum, ['id'=>'txtnonotaPS', 'readonly'=>'readonly', 'class'=>'form-control'])}}
                </div> 
              </div>
              <!-- Nama Barang -->
              <div class="container">
                <div class="form-group">
                <label>Nama Barang :</label>
                {{ Form::select('txtkodebarangSP', $getkode, null, ['id'=>'txtkodebarangSP', 'class'=>'form-control','onchange'=>'ubahstok()']) }}
                </div> 
              </div>
              <!-- Kategori Barang -->
              <div class="container">
                <div class="form-group">
                <label>Stok saat ini :</label>
                {{Form::text('txtstokskrngPS', '', ['id'=>'txtstokskrngPS','','class'=>'form-control','readonly'=>'readonly'])}}
                </div> 
              </div>
            <!-- Satuan Barang -->
            <div class="container">
              <div class="form-group">
              <label>Stok revisi :</label>
              {{Form::text('txtrevisiPS', '', ['id'=>'txtrevisiPS','','class'=>'form-control'])}}
              </div> 
            </div>
            <!-- Stok Barang -->
            <div class="container">
              <div class="form-group">
              <label>Keterangan :</label>
              {{Form::text('txtketeranganPS', '', ['id'=>'txtketeranganPS','','class'=>'form-control'])}}
             </div>
            </div>
            <!-- Tombol Submit -->
            <div class="row">
                <div class=" col m6">
                {{Form::submit('Simpan History',['name'=>'btnInsert','id'=>'btnInsert','class'=>'btn btn-success btn-xl'])}}
                  <input type='submit' class='btn btn-success btn-xl' name='btncancels' id='btncancels' value='Cancel'>
                </div>
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
            </div>
            </div>
          </div>

        </div>
      </div>
<<<<<<< HEAD
    </div>
  </div>
=======
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
  {{ Form::close() }}
  @endsection
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script>
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