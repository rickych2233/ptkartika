<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\penerimaanbb;
use App\tfpembelian;
use App\detailpenjualanbj;
use App\customer;
use App\barang;
use App\penjualanbj;
use App\user;
use App\pelunasanpiutang;


class penjualanBJController extends Controller
{
	public function newpenjualanBJ(){
		$getbarang					= new barang();
		$data['databarang']			= $getbarang->all();
		return view("newpenjualanBJ")->with($data);
	}

	public function getvalkodecustomer(Request $request){
		$getcustomer 	= new customer();
		$kodecustomer 	= $request->kodecustomer;
		$data 			= $getcustomer->getkodecustomer($kodecustomer);
		echo json_encode($data);
	}

	public function updatenewBJ(){
		$getbarang					= new barang();
		$data['databarang']			= $getbarang->all();
		return view("updatenewBJ")->with($data);
	}
	
	public function getnamabarang(Request $request){
		$getsupplier 	= new detailpenjualanbj();
		$namabarang 	= $request->namabarang;
		$data 			= $getsupplier->getdetail($namabarang);
		echo json_encode($data);
	}
    
    public function getpenjualanBJ(){
        $getsupplier				    = new customer();
        $data['datacustomer']		    = $getsupplier->all();
        $getpenjualanBJ				    = new penjualanbj();
		$data['datapenjualanBJ']		= $getpenjualanBJ->all();
        return view("penjualanBJ")->with($data);
    }

	public function viewpenjualanBJ(){
		$getpenjualanbj				= new penjualanbj();
		$data['datapenjualanBJ']	= $getpenjualanbj->all();
		// $data['nonotaBJFK']			= $getpenjualanbj->getpenjualanFK($nonota);
		return view("viewpenjualanBJ")->with($data);
	}

	public function editpenjualanBJ(){
		$user							= new penjualanbj();
		$data['datapenjualanbj']		= $user->all();
		$user1							= new detailpenjualanbj();
		$data['datadetailpenjualanbj']	= $user1->all();
		$user2							= new customer();
		$data['datacustomer']			= $user2->all();
		return view("editpenjualanBJ")->with($data);
	}

	public function viewpelunasanpiutang(){
		$user							= new penjualanbj();
		$data['datapenjualanbj']		= $user->all();
		$user1							= new detailpenjualanbj();
		$data['datadetailpenjualanbj']	= $user1->all();
		$user2							= new customer();
		$data['datacustomer']			= $user2->all();
		$user3							= new pelunasanpiutang();
		$data['datapelunasanpiutang']	= $user3->all();
		$user4							= new user();
		$data['datauser']				= $user4->all();
		return view("viewpelunasanpiutang")->with($data);
	}

	function addtocartpenjualanBJ($kode)
	{
		$cart = array();
		$databarang = [];
		$jum = 0;
		$getbarang			= new barang();
		$data['databarang']	= $getbarang->all();
		if(session()->get('penjualanBJ'))
		{
			$cart	= session()->get('penjualanBJ');
			$jum	= count($cart);
		}
		foreach($data['databarang'] as $row)
		{
			if($row->kodebarang == $kode)
			{
				$cart[$jum]['kodebarang']		 	= $row->kodebarang;
				$cart[$jum]['namabarang'] 			= $row->namabarang;
				$cart[$jum]['kodekategoribarang'] 	= $row->kodekategoribarang;
				$cart[$jum]['namakategoribarang'] 	= $row->namakategoribarang;
				$cart[$jum]['satuan'] 				= $row->satuan;
				$cart[$jum]['stok'] 				= $row->stok;
				$cart[$jum]['harga'] 				= $row->harga;
				$cart[$jum]['status'] 				= $row->status;
				session()->put("penjualanBJ",$cart);
				echo "sukses";
				return redirect('penjualanBJ');
			}
		}
	}

	function pelunasanpiutang($data1)
	{
		$cart = array();
		$jum = 0;
		$getbarang			= new penjualanbj();
		$data['databarang']	= $getbarang->all();
		if(session()->get('penjualanBJ3'))
		{
			$cart	= session()->get('penjualanBJ3');
			$jum	= count($cart);
		}
		foreach($data['databarang'] as $row)
		{
			if($row->nonotapenjualanBJ == $data1)
			{
				$cart[$jum]['nonotapenjualanBJ']		 	= $row->nonotapenjualanBJ;
				session()->put("penjualanBJ3",$cart);
				return redirect('viewpelunasanpiutang');
			}
		}
	}

	function updatepenjualanBJ($nonota)
	{
		$cart = array();
		$databarang = [];
		$jum = 0;
		$getbarang			= new penjualanbj();
		$data['databarang']	= $getbarang->all();
		if(session()->get('penjualanBJ2'))
		{
			$cart	= session()->get('penjualanBJ2');
			$jum	= count($cart);
		}
		foreach($data['databarang'] as $row)
		{
			if($row->nonotapenjualanBJ == $nonota)
			{
				$cart[$jum]['nonotapenjualanBJ']		 	= $row->nonotapenjualanBJ;
				session()->put("penjualanBJ2",$cart);
				return redirect('editpenjualanBJ');
			}
		}
	}
	
	public function savepenjualanBJ(Request $request){
		if($request->input("btncancels")) {
			$request->session()->forget('penjualanBJ3');
			$request->session()->forget('penjualanBJ2');
			$request->session()->forget('penjualanBJ');
			$request->session()->forget('notaDBJ1');
			return $this->viewpenjualanBJ();
		}
		else if($request->input("btnInsertpiutang")){
			$txtnonotapelunasan		= $request->txtnonotapelunasan;
			$txtsalespenjualan	    = $request->txtsalespenjualan;
			$txtkodecustomer		= $request->txtkodecustomer;
			$txttglpelunasan		= $request->txttglpelunasan;
			$txtgrandtotal			= $request->txtgrandtotal;
			$txtjumlahdibayar		= $request->txtjumlahdibayar;
			$txtnonotapenjualanBJ	= $request->txtnonotapenjualanBJ;
			$addpelunasan 			= new pelunasanpiutang();
			$addpelunasan->insertdata($txtnonotapelunasan,$txtsalespenjualan,$txtkodecustomer,$txttglpelunasan,$txtgrandtotal,$txtjumlahdibayar,$txtnonotapenjualanBJ);
			Alert::success('Success', 'Success Message');
			$request->session()->forget('penjualanBJ3');
			return redirect('viewpenjualanBJ');
		}
		else if($request->input("btnInsertPBJ")){
			$update = penjualanbj::find($request->txtupnonotapenjualanBJ);
			$update->kodecustomer 		= $request->txtupkodecustomer;
			$update->tglpembelianBJ 	= $request->txtuptglpembelianBJ;
			$update->statusBJ 			= $request->txtupstatuspembelian;
			$update->jenispembayaranBJ 	= $request->txtupjenispembayaran;
			$update->statuspesanBJ 		= $request->txtupstatuspemesanan;
			$update->save();
			$tempss2 = $request->txtupnomornotaDBJ;
			$temps3 = session()->get('notaDBJ1');
			for($i=0; $i< count($temps3); $i++){
				$update1 = detailpenjualanbj::find($request['txtupnomornotaDBJ'.$temps3[$i]]);
				$update1->namabarangDBJ 		= $request['txtupnamabarangDBJ'.$temps3[$i]];
				$update1->satuaanDBJ 			= $request['txtupsatuanDBJ'.$temps3[$i]];
				$update1->hargaDBJ 				= $request['txtuphargaDBJ'.$temps3[$i]];
				$update1->qtyDBJ 				= $request['txtupqtyDBJ'.$temps3[$i]];
				$update1->grandtotalDBJ 		= $request['txtupgrandtotalDBJ'.$temps3[$i]];
				$update1->statusDBJ 			= $request['txtstatusDBJ'.$temps3[$i]];
				$update1->nonotaBJFK 			= $request->txtupnonotapenjualanBJ;
				$update1->save();
			}
			Alert::success('Success', 'Success Message');
			$request->session()->forget('penjualanBJ2');
			$request->session()->forget('notaDBJ1');
			return redirect('viewpenjualanBJ');
		}
		else if($request->input("updatenambahBJ")){
			$txtupasdnonotaBJFK	= $request->txtupasdnonotaBJFK;
			$getbarang					= new barang();
			$data['databarang']			= $getbarang->all();
			return view("updatenewBJ")->with($data);
		}
        else if($request->input("btnInsert")){
			$rules = [
				'txtnonotapenjualanBJ'	=> 'required',
				'txtkodecustomerBJ'	    => 'required',
				'txttglpembelianBJ'		=> 'required',
				'txtstatusBJ'		    => 'required',
				'txtjenispembayaranBJ'	=> 'required'
			];
			$customeMessage = [
				'txtnonotapenjualanBJ.required'	=> 'Nomer Nota tidak boleh kosong',
				'txtkodecustomerBJ.required'	=> 'Nomer Nota tidak boleh kosong',
				'txttglpembelianBJ.required'	=> 'Supplier tidak boleh kosong',
				'txtstatusBJ.required'		    => 'Tanggal penerimaan jadi tidak boleh kosong',
				'txtjenispembayaranBJ.required'	=> 'Jenis Pembayaran tidak boleh kosong',
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('penjualanBJ')->withErrors($valid)->withInput();
			}else{

				//penjualanBJ
                $txtnonotapenjualanBJ	= $request->txtnonotapenjualanBJ;
				$txtkodecustomerBJ	    = $request->txtkodecustomerBJ;
				$txttglpembelianBJ		= $request->txttglpembelianBJ;
				$txtstatusBJ		    = $request->txtstatusBJ;
				$txtjenispembayaranBJ	= $request->txtjenispembayaranBJ;
				$statuspesanBJ			= $request->txtstatuspesanBJ;
				$adduser = new penjualanBJ();
				$adduser->insertdata($txtnonotapenjualanBJ,$txtkodecustomerBJ,$txttglpembelianBJ,$txtstatusBJ,$txtjenispembayaranBJ,$statuspesanBJ);

				//detail penjualan JB 
				$txtnonotaDBJ		= detailpenjualanbj::all()->count()+1;
				$somed				= $request->somed; 
				$txtpenjualanBJ		= $request->txtpenjualanBJ;
				$cart = array();
				if(session()->get("penjualanBJ"))
				{
					$cart = session()->get("penjualanBJ");
				}
				for($i= 0;$i < $somed; $i++){
					if($txtnonotaDBJ == 0)
					{
						$txtnonotaDBJ	= detailpenjualanbj::all()->count();
					}
					else
					{
						$txtnonotaDBJ	= detailpenjualanbj::all()->count()+1;
					}
					$txtnamabarangDBJ	= $cart[$i]['kodebarang'];
					$txtsatuaanDBJ		= $cart[$i]['satuan'];
					$txthargaDBJ		= $cart[$i]['harga'];
					$txtqtyDBJ			= $request['txtqtyDBJ'.$txtnamabarangDBJ];
					$txtgrandtotalDBJ 	= $request['txtgrandtotalDBJ'.$txtnamabarangDBJ];
					$txtstatusDBJ 		= $request['txtstatusDBJ'.$txtnamabarangDBJ];
					$txtnonotaBJFK		= $request->txtnonotapenjualanBJ;
					
					$insertdata 	= new detailpenjualanbj();
					$insertdata->insertdata($txtnonotaDBJ,$txtnamabarangDBJ,$txtsatuaanDBJ,$txthargaDBJ, $txtqtyDBJ, $txtgrandtotalDBJ, $txtstatusDBJ, $txtnonotaBJFK);
				}
				Alert::success('Success', 'Success Message');
				$request->session()->forget('penjualanBJ');
				return redirect('viewpenjualanBJ');
			}
		}
	}
}
