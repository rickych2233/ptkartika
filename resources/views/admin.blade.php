<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <!--?php include('preparation.php'); ?>-->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" >
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet"/>
      <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      
      <style>
        header , .main , footer{
          padding-left: 300px;
        }
        @media only screen and (max-width : 992px){
          header, .main, footer {
            padding-left: 0;
          }
        }
        .card-panel {
          min-height: 450px;
          margin: 0;
        }
        .highcharts-root {
          font-family: "Roboto" !important;
        }

        .highcharts-button-symbol {
          display: none;
        }

        .highcharts-title {
          font-size: 1.5rem !important;
        }
      </style>
  </head>

<body>
  {{ Form::open(array('url' => 'login')) }} 
  <!-- INI SIDENAV-->
    <nav class="red lighten-3">
      <div class="nav wrapper">
        <div class="container">
          <a href="" class="brand-logo center">Admin User</a>
          <ul id="slide-out" class="sidenav">
            <li>
              <div class="user-view">
                <div class="background">
                  <img src="images/tum.png">
                </div>
                <a href="#user"><img class="circle" src="images/kartika.jpg"></a>
                <a href="#name"><span class="white-text name">Admin</span></a>
                <a href="#email"><span class="white-text email">groupmager85@gmail.com</span></a>
              </div>
            </li>
            <li>
              <label>Manajemen Data Master</label>
              <select class="browser-default">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Master Kategori Barang</option>
                <option value="2">Master Barang</option>
                <option value="2">Master Pegawai</option>
                <option value="2">Manajemen Harga jual Barang</option>
              </select>
            </li>
            <li>
              <label>Manajemen Stok</label>
              <select class="browser-default">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Proses Produksi</option>
                <option value="2">Penyesuaian Stok</option>
              </select>
            </li>
            <li>
              <label>Manajemen Transaksi Penjualan</label>
              <select class="browser-default">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Master Kategori Barang</option>
                <option value="2">Sistem Pembayaran Customer</option>
                <option value="3">Transaksi Pemesanan Customer melalui Telepon</option>
                <option value="4">Pelunasan Transaksi Penjualan melalui Sales Penjualan</option>
                <option value="5">Pembuatan Daftar Tagihan Piutang Kepada Customer</option>
                <option value="6">Manajemen Hutang ke Supplier</option>
                <option value="7">Pengechekan Pembayaran Piutang dari Customer</option>
                <option value="8">Transaksi Penjualan pada Customer</option>
                <option value="9">Transaksi Pencatatan Pembayaran Piutang Customer</option>
                <option value="10">Delivery Order</option>
              </select>
            </li>
            <li>
              <label>Manajemen Transaksi Pembelian</label>
              <select class="browser-default">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Pembelian pada Supplier</option>
                <option value="2">Penerimaan Transaksi Pembelian</option>
              </select>
            </li>
            <li>
              <label>Daftar Laporan</label>
              <select class="browser-default">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Laporan Sisa Bahan Mentah dalam Gudang</option>
                <option value="2">Laporan Bahan Mentah yang Dikirim Supplier</option>
                <option value="3">Laporan Produksi Barang jadi Per Periode</option>
                <option value="4">Laporan Retur Barang dari Customer</option>
                <option value="5">Laporan Pelunasan Piutang Customer</option>
              </select>
            </li>
            <li><div class="divider"></div></li>
            <li><a href="#!"><i class="material-icons">help</i>Help</a></li>
            <li><a href="#!"><i class="material-icons">exit_to_app</i>Exit</a></li>
            <!--<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>-->
          </ul>
          <ul class="right hide-on-small-and-down collection" style="margin:0px;border:0px solid transparent">
            <li class="collection-item avatar blue" style="background-color:transparent !important; min-height: 60px;">
              <i class="material-icons white blue-text circle">notifications_active</i>
            </li>
          </ul>
        </div>
      </div>
    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large red lighten-3"><i class="material-icons">menu</i></a>
    </nav>
  <!-- INI MENU UTAMA-->
  <div class="main">
      <div class="col l4 m4 s12 center">
        <div class="card-panel center">
          <div class="row">  
            <h5>Master Barang <a href=""><span><i class="material-icons tiny">open_in_new</i></span></a><hr></h5>
            <br>
            <div class="input-field col s6">
              {{Form::text('kodebarang', '', ['id'=>'kodebarang','','class'=>'validate'])}}
              <label>Kode Barang</label>
            </div>
            <div class="input-field col s6">
              {{Form::text('namabarang', '', ['id'=>'namabarang','','class'=>'validate'])}}
              <label>Nama Barang</label>
            </div>
            <div class="input-field col s6">
              {{Form::text('kodekategoribarang', '', ['id'=>'kodekategoribarang','','class'=>'validate'])}}
              <label>Kode Kategori Barang</label>
            </div>
            <div class="input-field col s6">
              {{Form::text('harga', '', ['id'=>'harga','','class'=>'validate'])}}
              <label>Harga</label>
            </div>
            <br>  
            <div class="input-field col s6">
              {{Form::text('stok', '', ['id'=>'stok','','class'=>'validate'])}}
              <label>Stok</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
    $('.dropdown-trigger').dropdown();
  </script> 
  {{ Form::close() }}
</body>
</html>
