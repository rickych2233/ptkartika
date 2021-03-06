<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//all
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});

// Route::get('login',[
//     'uses'          => 'welcomeController@login'
// ]);

//user
Route::get('newregisteruser',[
    'uses' => 'userController@newregisteruser'
]);
Route::post('saveregisteruser', [
    'uses'  => 'userController@saveregisteruser'
]);
Route::get('user', [
	'uses' => 'userController@getuser',
]);

//kategoribarang
Route::get('login',[
    'uses' => 'BarangController@login'
]);
Route::get('newkategoribarang',[
    'uses' => 'BarangController@newkategoribarang'
]);
Route::post('savekategoribarang',[
    'uses' => 'BarangController@savekategoribarang'
]);
Route::get('kategoribarang', [
	'uses' => 'BarangController@getkategoribarang'
]);
Route::get('laporanbahanmentah', [
	'uses' => 'BarangController@laporanbahanmentah'
]);

//barang
Route::get('newbarang',[
    //'middleware'    => 'auth',
    'uses'          => 'BarangController@newbarang'
]);
Route::post('savebarang',[
    'uses'          => 'BarangController@savebarang'
]);
Route::get('barang', [
	'uses' => 'BarangController@getbarang'
]);
Route::get('getproduksiperperiode', [
	'uses' => 'BarangController@getproduksiperperiode'
]);
Route::get('getreturbarang', [
	'uses' => 'BarangController@getreturbarang'
]);
Route::get('getpiutangcustomer', [
	'uses' => 'BarangController@getpiutangcustomer'
]);
Route::get('getbulanproduksi', [
	'uses' => 'BarangController@getbulanproduksi'
]);
Route::get('getperbandingan', [
	'uses' => 'BarangController@getperbandingan'
]);
//prosesproduksi
Route::get('addtocart/{kode}',[
    'uses' => 'BarangController@addtocart'
]);
Route::get('updateprosesproduksi/{nonotaPP}',[
    'uses' => 'BarangController@updateprosesproduksi'
]);
Route::post('saveprosesproduksi',[
    'uses' => 'BarangController@saveprosesproduksi'
]);
Route::get('prosesproduksi', [
	'uses' => 'BarangController@getprosesproduksi'
]);
Route::get('newprosesproduksi', [
	'uses' => 'BarangController@newprosesproduksi'
]);
Route::get('viewprosesproduksi', [
	'uses' => 'BarangController@viewprosesproduksi'
]);
Route::get('editprosesproduksi', [
	'uses' => 'BarangController@editprosesproduksi'
]);
Route::get('getbulan', [
	'uses' => 'BarangController@getbulan'
]);
//penerimaanbahanbaku
Route::get('addtocartpenerimaanBB/{kode}',[
    'uses' => 'bahanbakuController@addtocartpenerimaanBB'
]);
Route::get('updateBB/{kode2}',[
    'uses' => 'bahanbakuController@updateBB'
]);
Route::get('editbahanbaku',[
    'uses' => 'bahanbakuController@editbahanbaku'
]);
Route::get('newpenerimaanBB',[
    'uses' => 'bahanbakuController@newpenerimaanBB'
]);
Route::get('detailpenerimaanBB',[
    'uses' => 'bahanbakuController@detailpenerimaanBB'
]);
Route::post('savepenerimaanBB',[
    'uses' => 'bahanbakuController@savepenerimaanBB'
]);
Route::get('penerimaanBB', [
	'uses' => 'bahanbakuController@getpenerimaanBB'
]);
Route::get('viewpenerimaanBB', [
	'uses' => 'bahanbakuController@viewpenerimaanBB'
]);
Route::get('viewhutangsupplier',[
    'uses' => 'bahanbakuController@viewhutangsupplier'
]);

//penjualanBJ
Route::get('updatepenjualanBJ/{nonota}',[
    'uses' => 'penjualanBJController@updatepenjualanBJ'
]);
Route::get('addtocartpenjualanBJ/{kode}',[
    'uses' => 'penjualanBJController@addtocartpenjualanBJ'
]);
Route::get('addupdatetocartpenjualanBJ/{kode2}',[
    'uses' => 'penjualanBJController@addupdatetocartpenjualanBJ'
]);
Route::get('pelunasanpiutang/{kode3}',[
    'uses' => 'penjualanBJController@pelunasanpiutang'
]);
Route::get('viewpelunasanpiutang',[
    'uses' => 'penjualanBJController@viewpelunasanpiutang'
]);
Route::get('viewpiutangcustomer',[
    'uses' => 'penjualanBJController@viewpiutangcustomer'
]);
Route::get('updatenewBJ',[
    'uses' => 'penjualanBJController@updatenewBJ'
]);
Route::get('newpenjualanBJ',[
    'uses' => 'penjualanBJController@newpenjualanBJ'
]);
Route::get('getnamabarang',[
    'uses' => 'penjualanBJController@getnamabarang'
]);
Route::get('editpenjualanBJ', [
	'uses' => 'penjualanBJController@editpenjualanBJ'
]);
Route::get('penjualanBJ', [
	'uses' => 'penjualanBJController@getpenjualanBJ'
]);
Route::post('savepenjualanBJ',[
    'uses' => 'penjualanBJController@savepenjualanBJ'
]);
Route::get('viewpenjualanBJ', [
	'uses' => 'penjualanBJController@viewpenjualanBJ'
]);
Route::get('getvalkodecustomer',[
    'uses' => 'penjualanBJController@getvalkodecustomer'
]);

//tfpembelian
Route::get('addtocartDPS/{kode}',[
    'uses' => 'manajemenpembelianController@addtocartDPS'
]);
Route::get('updatetfpembelian/{kode1}',[
    'uses' => 'manajemenpembelianController@updatetfpembelian'
]);
Route::get('edittfpembelian', [
	'uses' => 'manajemenpembelianController@edittfpembelian'
]);
Route::post('savetfpembelian',[
    'uses' => 'manajemenpembelianController@savetfpembelian'
]);
Route::get('tfpembelian', [
	'uses' => 'manajemenpembelianController@gettfpembelian'
]);
Route::get('newtfpembelian', [
	'uses' => 'manajemenpembelianController@newtfpembelian'
]);
Route::get('viewtfpembelian', [
	'uses' => 'manajemenpembelianController@viewtfpembelian'
]);
Route::get('getkodesupplier',[
    'uses'          => 'manajemenpembelianController@getkodesupplier'
]);
Route::get('getkodebarang',[
    'uses'          => 'manajemenpembelianController@getkodebarang'
]);

//supplier
Route::get('newsupplier',[
    'uses'          => 'supplierController@newsupplier'
]);
Route::post('savesupplier',[
    'uses'          => 'supplierController@savesupplier'
]);
Route::get('supplier', [
	'uses'          => 'supplierController@getsupplier'
]);

//customer
Route::get('newcustomer',[
    'uses'          => 'customerController@newcustomer'
]);
Route::post('savecustomer',[
    'uses'          => 'customerController@savecustomer'
]);
Route::get('customer', [
	'uses'          => 'customerController@getcustomer'
]);

//history harga
Route::get('newhistoryharga',[
    'uses'          => 'historyhargaController@newhistoryharga'
]);
Route::post('savehistoryharga',[
    'uses'          => 'historyhargaController@savehistoryharga'
]);
Route::get('historyharga', [
	'uses'          => 'historyhargaController@gethistoryharga'
]);

Route::get('gethargabarang',[
    'uses'          => 'historyhargaController@gethargabarang'
]);

//penyesuaian stok
Route::get('newpenyesuaianstok',[
    'uses'          => 'penyesuaianstokController@newpenyesuaianstok'
]);
Route::post('savepenyesuaianstok',[
    'uses'          => 'penyesuaianstokController@savepenyesuaianstok'
]);
Route::get('penyesuaianstok', [
	'uses'          => 'penyesuaianstokController@getpenyesuaianstok'
]);
Route::get('viewpenyesuaianstok', [
	'uses'          => 'penyesuaianstokController@viewpenyesuaianstok'
]);
Route::get('getstokbarang',[
    'uses'          => 'penyesuaianstokController@getstokbarang'
]);

//pengirimanbarang

Route::get('updatepengirimanbarang/{kode1}',[
    'uses'          => 'pengirimanController@updatepengirimanbarang'
]);
Route::get('returpengirimanbarang/{kode2}',[
    'uses'          => 'pengirimanController@returpengirimanbarang'
]);
Route::get('addtocartpengirimanbarang/{kode}',[
    'uses'          => 'pengirimanController@addtocartpengirimanbarang'
]);
Route::get('returpengiriman',[
    'uses'          => 'pengirimanController@returpengiriman'
]);
Route::get('detailpengirimanbarang',[
    'uses'          => 'pengirimanController@detailpengirimanbarang'
]);
Route::get('listreturbarang',[
    'uses'          => 'pengirimanController@listreturbarang'
]);
Route::get('newbarangbuatpengiriman',[
    'uses'          => 'pengirimanController@newbarangbuatpengiriman'
]);
Route::get('viewpengiriman',[
    'uses'          => 'pengirimanController@viewpengiriman'
]);
Route::get('newpengiriman',[
    'uses'          => 'pengirimanController@newpengiriman'
]);
Route::post('savepengirimanbarang',[
    'uses'          => 'pengirimanController@savepengirimanbarang'
]);
