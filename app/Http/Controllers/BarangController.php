<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\kategoribarang;
use App\barang;
use App\prosesproduksi;
use App\detailprosesproduksi;
use App\user;
use App\penerimaanbb;
use App\returpengiriman;
use App\penjualanbj;
use App\detailpenjualanbj;

class BarangController extends Controller
{	//kategoribarang
	public function login(){
		return view("welcome");
	}

	public function newkategoribarang(){
		$getkodekategoribarang 			= new kategoribarang();
		$data['datakategoribarang'] 	= $getkodekategoribarang->all();
		return view("newkategoribarang")->with($data);
	}

	public function laporanbahanmentah(){
		$getbarang 					= new barang();
		$data['databarang'] 		= $getbarang->all();
		$getpenerimaanbb 			= new penerimaanbb();
		$data['datapenerimaanbb'] 	= $getpenerimaanbb->all();
		$getproseproduksi			= new prosesproduksi();
		$data['dataprosesproduksi']	= $getproseproduksi->all();
		$getreturpengiriman			= new returpengiriman();
		$data['datareturpengiriman']= $getreturpengiriman->all();
		$getpiutangcustomer			= new detailpenjualanbj();
		$data['datapiutangcustomer']= $getpiutangcustomer->all();
		return view("laporanbahanmentah")->with($data);
	}

	public function getbulan(Request $request){
		$getsupplier 	= new penerimaanbb();
		$tglpenerimaan 	= $request->tgl;
		$data 			= $getsupplier->gettglpenerimaan($tglpenerimaan);
		echo json_encode($data);
	}
	
	public function getproduksiperperiode(Request $request){
		$getsupplier 	= new prosesproduksi();
		$tgldari 		= $request->tgldari;
		$tglsampai 		= $request->tglsampai;
		$data 			= $getsupplier->gettampilproduksi($tgldari,$tglsampai);
		echo json_encode($data);
	}

	public function getreturbarang(Request $request){
		$getretur 		= new returpengiriman();
		$tahuningin 	= $request->tahuningin;
		$data 			= $getretur->gettampilretur($tahuningin);
		echo json_encode($data);
	}

	public function getpiutangcustomer(Request $request){
		$getpiutang 		= new penjualanbj();
		$tahuncustomer 		= $request->tahuncustomer;
		$data 				= $getpiutang->gettampilpiutang($tahuncustomer);
		echo json_encode($data);
	}

	public function getbulanproduksi(Request $request){
		$getprosesproduksi 		= new prosesproduksi();
		$bulanproduksi 			= $request->bulanproduksi;
		$data 					= $getprosesproduksi->getproduksi($bulanproduksi);
		echo json_encode($data);
	}

	public function getperbandingan(Request $request){
		$getdetailpenjualan 		= new detailpenjualanbj();
		$tahunperbandingan 			= $request->tahunperbandingan;
		$data 						= $getdetailpenjualan->getproduksi($tahunperbandingan);
		echo json_encode($data);
		// echo $data;
	}

	public function getkategoribarang() {
		$getkategoribarang 					= new kategoribarang();
		$data['datakategoribarang'] 		= $getkategoribarang->all();
		return view("kategoribarang")->with($data);
	}

	public function savekategoribarang(Request $request){
		if($request->input("btncancels")) {
			return $this->getkategoribarang();
		}
		else if($request->input("btnlogin")){
			$getuser	= $request->username;
			$getpass	= $request->password;
			$usr		= new user();
			$result		= $usr->ceklogin($getuser,$getpass);
			$data['dtusr']	= $usr->all();
			if(count($result) > 0){
				$request->session()->put('data',$getuser);
				foreach($data['dtusr'] as $row10){
					if($row10->username == $getuser){
						$vars = $row10->role;
						$request->session()->put('data2',$vars);
					}
				}
				return redirect("kategoribarang");
			}else{
				return redirect('login');
			}
			
		}
		else if($request->input("btnEditbarang")){
			$update = kategoribarang::find($request->txtupkodekategoribarang);
			$update->namakategoribarang 	= $request->txtupnamakategoribarang;
			$update->statuskategoribarang 	= $request->txtupstatuskategoribarang;
			$update->save();
			return redirect('kategoribarang');
		}
		else if($request->input("btnInsert")){
			$rules = [
				'txtnamakategoribarang'			=> 'required|max:50',
				'txtstatuskategoribarang' 		=> 'required'
			];
			$customeMessage = [
				'txtnamakategoribarang.max'		=> 'Nama Kategori Barang tidak boleh kosong',
				'txtstatuskategoribarang.max'	=> 'Status Kategori Barang tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('newkategoribarang')->withErrors($valid)->withInput();
			}else{
				$txtkodekategoribarang		= $request->txtkodekategoribarang;
				$txtnamakategoribarang		= $request->txtnamakategoribarang;
				$txtstatuskategoribarang	= $request->txtstatuskategoribarang;
				$adduser = new kategoribarang();
				$adduser->insertdata($txtkodekategoribarang,$txtnamakategoribarang,$txtstatuskategoribarang);
				$sccmsg = "database insert"; 
				return redirect('kategoribarang');
			}
		}
	}
	//barang
	public function getbarang() {	
		$users = DB::table('barang')->paginate(5);
		return view("barang",['databarang'=>$users]);
	}
	
	public function newbarang(){
		$getbarang 						= new barang();
		$data['databarang'] 			= $getbarang->all();
		$getkodekategoribarang 			= new kategoribarang();
		$data['datakategoribarang'] 	= $getkodekategoribarang->all();
		return view("newbarang")->with($data);
	}

	public function savebarang(Request $request) {
		if($request->input("btncancel")) {
			$getbarang 						= new barang();
			$data['databarang'] 			= $getbarang->paginate(5);
			return redirect("barang")->with($data);
		}
		else if($request->input("btnupbarang")){
			$update = barang::find($request->txtupkodebarang);
			$update->namabarang 		= $request->txtupnamabarang;
			$update->kodekategoribarang = $request->txtupkodekategoribarang;
			$update->satuan 			= $request->txtupsatuanbarang;
			$update->stok 				= $request->txtupstokbarang;
			$update->harga 				= $request->txtuphargabarang;
			$update->status 			= $request->txtupstatusbarang;
			$update->save();
			return redirect('barang');
		}
		else if($request->input("btninsertbarang")){
			$rules = [
				'txtnamabarang'			=> 'required',
				'txtkodekategoribarang'	=> 'required',
				'txtsatuanbarang'		=> 'required',
				'txtstokbarang'			=> 'required|max:11',
				'txthargabarang'		=> 'required|max:11',
				'txtstatusbarang'		=> 'required|max:9'
			];
			$customeMessage = [
				'txtnamabarang.required'			=> 'nama Kategori Barang tidak boleh kosong',
				'txtkodekategoribarang.required'	=> 'Kode Kategori Barang tidak boleh kosong',
				'txtsatuanbarang.required'			=> 'satuan Barang harus di isi',
				'txtstokbarang.required'			=> 'stok Barang tidak boleh kosong',
				'txthargabarang.required'			=> 'harga  Barang tidak boleh kosong',
				'txtstatusbarang.required'			=> 'status  Barang tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('newbarang')->withErrors($valid)->withInput();
			}else{
				$txtkodebarang			= $request->txtkodebarang;
				$txtnamabarang			= $request->txtnamabarang;
				$txtkodekategoribarang	= $request->txtkodekategoribarang;
				$txtsatuanbarang		= $request->txtsatuanbarang;
				$txtstokbarang			= $request->txtstokbarang;
				$txthargabarang			= $request->txthargabarang;
				$txtstatusbarang		= $request->txtstatusbarang;
				$adduser = new barang();
				$adduser->insertdata($txtkodebarang,$txtnamabarang,$txtkodekategoribarang,$txtsatuanbarang,$txtstokbarang,$txthargabarang,$txtstatusbarang);
				Alert::success('Success Title', 'Success Message');
				return redirect('barang');
			}
		}
	}

	
	//proses produksi
	public function getprosesproduksi() {
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->all();

		$getprosesproduksi 					= new prosesproduksi();
		$data['dataprosesproduksi'] 		= $getprosesproduksi->all();
		return view("prosesproduksi")->with($data);
	}

	public function newprosesproduksi() {
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->all();

		$getprosesproduksi 					= new prosesproduksi();
		$data['dataprosesproduksi'] 		= $getprosesproduksi->all();
		return view("newprosesproduksi")->with($data);
	}

	public function viewprosesproduksi() {
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->all();

		$getprosesproduksi 					= new prosesproduksi();
		$data['dataprosesproduksi'] 		= $getprosesproduksi->all();
		return view("viewprosesproduksi")->with($data);
	}

	public function editprosesproduksi() {
		$getdetailPP 						= new detailprosesproduksi();
		$data['datadetailPP'] 				= $getdetailPP->all();
		$getprosesproduksi 					= new prosesproduksi();
		$data['dataprosesproduksi'] 		= $getprosesproduksi->all();
		return view("editprosesproduksi")->with($data);
	}

	function updateprosesproduksi($nonotaPP)
	{
		$cart = array();
		$dataPP = [];
		$jum = 0;
		$getPP				= new prosesproduksi();
		$data['dataPP']		= $getPP->all();
		if(session()->get('sessioneditPP'))
		{
			$cart	= session()->get('sessioneditPP');
			$jum	= count($cart);
		}
		foreach($data['dataPP'] as $row)
		{
			if($row->nonotaPP == $nonotaPP)
			{
				$cart[$jum]['nonotaPP']		 	= $row->nonotaPP;
				session()->put("sessioneditPP",$cart);
				// echo "<script>alert('$txtqtyDPP');</script>";
				return redirect('editprosesproduksi');
			}
		}
	}

	public function saveprosesproduksi(Request $request){
		if($request->input("btncancels")) {
			$request->session()->forget('sessioneditPP');
			$request->session()->forget('cart');
			return $this->viewprosesproduksi();
		}
		elseif($request->input("btnupdateDPP")){
			$update = prosesproduksi::find($request->txtupnonoPP);
			$update->tglPP 				= $request->txttglupPP;
			$update->kodebarang 		= $request->txtupkodebarangPP;
			$update->qtyhasilPP 		= $request->txtqtyupPP;
			$update->save();
			$temps3 = session()->get('nonotaDPP3');
			// dd($temps3);
			for($i=0; $i < count($temps3); $i++){
				$update1 = detailprosesproduksi::find($request['txtupnonotaDPP'.$temps3[$i]]);
				$update1->kodebarang 			= $request['txtupkodebarang'.$temps3[$i]];
				$update1->qtyDPP 				= $request['txtqtyupDPP'.$temps3[$i]];
				$update1->hargaDPP 				= $request['txtuphargaDPP'.$temps3[$i]];
				$update1->nonotaPP 				= $request->txtupnonoPP;
				$update1->save();
			}
			Alert::success('Success', 'Success Message');
			$request->session()->forget('sessioneditPP');
			return redirect('viewprosesproduksi');
		}
		else if($request->input("btneditPP")){
			$txthidenonotaPP		= $request->txthidenonotaPP;
			return $this->editprosesproduksi();
		}
		else if($request->input("btnInsertPP")){
			$rules = [
				'txtnonotaPP'		=> 'required',
				'txttglPP'			=> 'required',
				'txtbarangjadiPP'	=> 'required',
				'txtqtyhasilPP'		=> 'required',
			];
			$customeMessage = [
				'txtnonotaPP.required'		=> 'Nomer Nota tidak boleh kosong',
				'txttglPP.required'			=> 'tanggal tidak boleh kosong',
				'txtbarangjadiPP.required'	=> 'barang jadi tidak boleh kosong',
				'txtqtyhasilPP.required'	=> 'qty barang tidak boleh kosong',
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('prosesproduksi')->withErrors($valid)->withInput();
			}else{
				//proses produksi
				$txtnonotaPP		= $request->txtnonotaPP;
				$txttglPP			= $request->txttglPP;
				$txtbarangjadiPP	= $request->txtbarangjadiPP;
				$txtqtyhasilPP		= $request->txtqtyhasilPP;

				//detail produksi 
				$adduser = new prosesproduksi();
				$adduser->insertdata($txtnonotaPP,$txttglPP,$txtbarangjadiPP,$txtqtyhasilPP);
				$txtnonotaDPP		= detailprosesproduksi::all()->count()+1;
				$somedata			= $request->somedata; 
				$cart = array();
				if(session()->get("cart"))
				{
					$cart = session()->get("cart");
				}
				for($i= 0;$i < $somedata; $i++){
					if($txtnonotaDPP == 0)
					{
						$txtnonotaDPP	= detailprosesproduksi::all()->count();
					}
					else
					{
						$txtnonotaDPP	= detailprosesproduksi::all()->count()+1;
					}
					$txtbarangbakuDPP	= $cart[$i]['kodebarang'];
					$txtqtyDPP			= $request['txtqtyDPP'.$txtbarangbakuDPP];//gantivariablealaCW
					echo "<script>alert('$txtqtyDPP');</script>";
					$txthargaDPP		= $cart[$i]['harga'];
					$txtnonotaPP		= $request->txtnonotaPP;
					$adddetailproduksi 	= new detailprosesproduksi();
					$adddetailproduksi->insertdata($txtnonotaDPP,$txtbarangbakuDPP,$txtqtyDPP,$txthargaDPP,$txtnonotaPP);
				}
				Alert::success('Success Title', 'Success Message');
				$request->session()->forget('sessioneditPP');
				$request->session()->forget('cart');
				return redirect('viewprosesproduksi');
			}
		}
	}

	function addtocart($kode)
	{
		//session()->forget('cart'); //cara untuk menghilangkan session (belum jalan)
		//echo $kode;
		$cart = array();
		$databarang = [];
		$jum =0;
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->select_all();
		if(session()->get('cart'))
		{
			$cart 	= session()->get('cart');
			$jum 	= count($cart);
		}
		foreach($data['databarang'] as $row){
			if($row->kodebarang == $kode){
				$cart[$jum]['kodebarang']		 	= $row->kodebarang;
				$cart[$jum]['namabarang'] 			= $row->namabarang;
				$cart[$jum]['kodekategoribarang'] 	= $row->kodekategoribarang;
				$cart[$jum]['namakategoribarang'] 	= $row->namakategoribarang;
				$cart[$jum]['satuan'] 				= $row->satuan;
				$cart[$jum]['stok'] 				= $row->stok;
				$cart[$jum]['harga'] 				= $row->harga;
				$cart[$jum]['status'] 				= $row->status;
				session()->put("cart",$cart);
				echo "sukses";
				return redirect('prosesproduksi');
			}
		}
	} 
}
