<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\penerimaanbb;
use App\tfpembelian;
use App\detailpenerimaanbb;
use App\supplier;
use App\barang;

class bahanbakuController extends Controller
{
	public function detailpenerimaanBB() {	
		$getbarang					= new barang();
		$data['databarang']			= $getbarang->all();
		$getbahanbaku 			= new penerimaanbb();
		$data['datacustomer'] 	= $getbahanbaku->all();
		return view("detailpenerimaanBB")->with($data);
	}

	public function newpenerimaanBB(){
		$getsupplier				= new supplier();
		$data['datasupplier']		= $getsupplier->all();
		$getpenerimaanbb			= new penerimaanbb();
		$data['datapenerimaanbb']	= $getpenerimaanbb->all();
		return view("newpenerimaanBB")->with($data);
	}

	public function viewpenerimaanBB(){
		$getpenerimaanbb			= new penerimaanbb();
		$data['datapenerimaanbb']	= $getpenerimaanbb->all();
		return view("viewpenerimaanBB")->with($data);
	}

	function addtocartpenerimaanBB($kode)
	{
		$cart = array();
		$databarang = [];
		$jum = 0;
		$getbarang			= new barang();
		$data['databarang']	= $getbarang->all();
		if(session()->get('penerimaanBB'))
		{
			$cart	= session()->get('penerimaanBB');
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
				session()->put("penerimaanBB",$cart);
				echo "sukses";
				return redirect('newpenerimaanBB');
			}
		}
	}
	
	public function savepenerimaanBB(Request $request){
		if($request->input("btncancels")) {
			return $this->viewpenerimaanBB();
		}else if($request->input("btnInsertBB")){
			$rules = [
				//'txtkodekategoribarang'	=> 'required',
				'nonotapenerimaanBB'		=> 'required',
				'txtsupplierpenerimaanBB'	=> 'required',
				'txttglpenerimaanBB'		=> 'required',
				'txtstatuspenerimaanBB'		=> 'required',
				'txtjenispembayaranBB'		=> 'required',
				//'txtnonotaDPP'		=> 'required',
			];
			$customeMessage = [
				'nonotapenerimaanBB.required'			=> 'Nomer Nota tidak boleh kosong',
				'txtsupplierpenerimaanBB.required'		=> 'Nomer Nota tidak boleh kosong',
				'txttglpenerimaanBB.required'			=> 'Supplier tidak boleh kosong',
				'txtstatuspenerimaanBB.required'		=> 'Tanggal penerimaan jadi tidak boleh kosong',
				'txtjenispembayaranBB.required'			=> 'Jenis Pembayaran tidak boleh kosong',

				//'txtnonotaDPP.required'			=> 'nomer nota barang tidak boleh kosong',
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('newpenerimaanBB')->withErrors($valid)->withInput();
			}else{
				//penerimaanBB
				$nonotapenerimaanBB			= $request->nonotapenerimaanBB;
				$txtsupplierpenerimaanBB	= $request->txtsupplierpenerimaanBB;
				$txttglpenerimaanBB			= $request->txttglpenerimaanBB;
				$txtstatuspenerimaanBB		= $request->txtstatuspenerimaanBB;
				$txtjenispembayaranBB		= $request->txtjenispembayaranBB;
				$adduser = new penerimaanBB();
				$adduser->insertdata($nonotapenerimaanBB,$txtsupplierpenerimaanBB,$txttglpenerimaanBB,$txtstatuspenerimaanBB,$txtjenispembayaranBB);
				//detail penerimaan BB 
				$txtnonotaDPBB		= detailpenerimaanbb::all()->count()+1;
				$somedatas			= $request->somedatas; 
				$cart = array();
				if(session()->get("penerimaanBB"))
				{
					$cart = session()->get("penerimaanBB");
				}
				for($i= 0;$i < $somedatas; $i++){
					if($txtnonotaDPBB == 0)
					{
						$txtnonotaDPBB	= detailpenerimaanbb::all()->count();
					}
					else
					{
						$txtnonotaDPBB	= detailpenerimaanbb::all()->count()+1;
					}
					$txtnamabarangDPBB	= $cart[$i]['kodebarang'];
					$txtsatuaanDPBB		= $cart[$i]['satuan'];
					$txthargaDPBB		= $cart[$i]['harga'];
					$txtPBBkodebarang 	= $request->txtPBBkodebarang;
					$qtypenerimaanBB	= $request['txtqtypenerimaanBB'.$txtPBBkodebarang];
					$qtypemesananBB		= $request['txtqtypemesananBB'.$txtPBBkodebarang];
					$nonotapenerimaanBB = $nonotapenerimaanBB;
					$adddetailproduksi 	= new detailpenerimaanbb();
					$adddetailproduksi->insertdata($txtnonotaDPBB,$txtnamabarangDPBB,$txtsatuaanDPBB,$txthargaDPBB,$qtypenerimaanBB,$qtypemesananBB,$nonotapenerimaanBB);
				}
				Alert::success('Success Title', 'Success Message');
				$request->session()->forget('cart');
				return redirect('viewpenerimaanBB');
			}
		}
	}
}
