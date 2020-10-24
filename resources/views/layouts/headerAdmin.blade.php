<ul id="manajemendatamaster" class="dropdown-content">
  <!--<li class="divider"></li>-->
  <li><a href="{!! url('kategoribarang'); !!}">Master Kategori Barang</a></li>
  <li><a href="{!! url('barang'); !!}">Master Barang</a></li>
  <li><a href="{!! url('user'); !!}">Master Pegawai</a></li>
  <li><a href="{!! url('historyharga'); !!}">History Harga</a></li>
  <li><a href="{!! url('supplier'); !!}">Supplier</a></li>
  <li><a href="{!! url('customer'); !!}">Customer</a></li>
</ul>
<ul id="manajemenstok" class="dropdown-content">
  <!--<li class="divider"></li>-->
  <li><a href="{!! url('viewprosesproduksi'); !!}">Proses Produksi</a></li>
  <li><a href="{!! url('viewpenyesuaianstok'); !!}">Penyesuaian Stok</a></li>
</ul>
<ul id="transaksipenjualan" class="dropdown-content">
  <!--<li class="divider"></li>-->
  <li><a href="{!! url('viewpenjualanBJ'); !!}">Penjualan Bahan Jadi</a></li>
  <li><a href="{!! url('viewpiutangcustomer'); !!}">List Piutang</a></li>
  <li><a href="{!! url('viewpengiriman'); !!}">List Pengiriman Barang</a></li>
</ul>
<ul id="transaksipembelian" class="dropdown-content">
  <!--<li class="divider"></li>-->
  <li><a href="{!! url('viewtfpembelian'); !!}">Pembelian Bahan Baku</a></li>
  <li><a href="{!! url('viewpenerimaanBB'); !!}">Penerimaan Bahan Baku</a></li>
  <li><a href="{!! url('viewhutangsupplier'); !!}">List Hutang ke supplier</a></li>
</ul>
<ul id="login" class="dropdown-content">
  <!--<li class="divider"></li>-->
  <li><a href="{!! url('login'); !!}">Log Out</a></li>
</ul>

<nav>
  <div class="nav-wrapper">
    <a href="#" class="dropdown-trigger right"  data-target="login" class=""><i class="material-icons right">arrow_drop_down</i>{{session('data')}}</a>
    <!--<a href="#"><img class="circle brand-logo right" src="images/kartika.jpg"></a>-->  
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li><a class="dropdown-trigger"  data-target="manajemendatamaster" href=""><i class="material-icons right">arrow_drop_down</i>Manajemen Data Master</a></li>
      <li><a class="dropdown-trigger"  data-target="manajemenstok" href=""><i class="material-icons right">arrow_drop_down</i>Manajemen Stok</a></li>
      <li><a class="dropdown-trigger"  data-target="transaksipenjualan" href=""><i class="material-icons right">arrow_drop_down</i>Manajemen Transaksi Penjualan</a></li>
      <li><a class="dropdown-trigger"  data-target="transaksipembelian" href=""><i class="material-icons right">arrow_drop_down</i>Manajemen Transaksi Pembelian</a></li>
      <li><a class="dropdown-trigger"  data-target="daftarlaporan" href=""><i class="material-icons right">arrow_drop_down</i>Daftar Laporan</a></li>
    </ul>
  </div>
</nav>

<br><br>
<div class="">
  @include('sweetalert::alert')
  @yield("content")
</div>


<script language='javascript'>
$(document).ready(function() {
  $(".dropdown-trigger").dropdown({
    'closeOnClick': true,
    'hover': true,
    'alignment': 'left',
  });
});
</script>