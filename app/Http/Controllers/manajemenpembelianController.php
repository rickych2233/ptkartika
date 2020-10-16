<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\tfpembelian;
use App\supplier;
use App\detailtfpembelian;
use App\barang;

class manajemenpembelianController extends Controller
{
	public function getkodebarang(Request $request){
		$getsupplier 	= new barang();
		$kodebarang 	= $request->kodebarang;
		$data 			= $getsupplier->getpenambahan($kodebarang);
		echo json_encode($data);
	}
	public function getkodesupplier(Request $request){
		$getsupplier 	= new supplier();
		$kodesupplier 	= $request->kodesupplier;
		$data 			= $getsupplier->gettfpembelian($kodesupplier);
		echo json_encode($data);
	}

    public function newtfpembelian(){
		$gettfpembelian 			= new tfpembelian();
		$data['datatfpembelian'] 	= $gettfpembelian->all();

		$getbarang					= new barang();
		$data['databarang']			= $getbarang->all();

		$getsupplier 			= new supplier();
		$data['datasupplier'] 	= $getsupplier->all();
		return view("newtfpembelian")->with($data);
    }

	public function viewtfpembelian(){
		$gettfpembelian 			= new tfpembelian();
		$data['datatfpembelian'] 	= $gettfpembelian->all();

		$getbarang					= new barang();
		$data['databarang']			= $getbarang->all();

		$getsupplier 			= new supplier();
		$data['datasupplier'] 	= $getsupplier->all();
		return view("viewtfpembelian")->with($data);
    }

    public function gettfpembelian(){
		$gettfpembelian 			= new tfpembelian();
		$data['datatfpembelian'] 	= $gettfpembelian->all();

		$getsupplier 			= new supplier();
		$data['datasupplier'] 	= $getsupplier->all();
		return view("tfpembelian")->with($data);
	}
	
	public function edittfpembelian(){
		$gettfpembelian 			= new tfpembelian();
		$data['datatfpembelian'] 	= $gettfpembelian->all();

		$getdetailTF 			= new detailtfpembelian();
		$data['datadetailTF'] 	= $getdetailTF->all();
		return view("edittfpembelian")->with($data);
	}

	function updatetfpembelian($nonotaTF)
	{
		$cart = array();
		$dataPP = [];
		$jum = 0;
		$getTF				= new tfpembelian();
		$data['dataTF']		= $getTF->all();
		if(session()->get('sessioneditTF'))
		{
			$cart	= session()->get('sessioneditTF');
			// dd($nonotaTF);
			$jum	= count($cart);
		}
		foreach($data['dataTF'] as $row)
		{
			if($row->nonotaTFPembelian == $nonotaTF)
			{
				$cart[$jum]['nonotaTFPembelian']		 	= $row->nonotaTFPembelian;
				session()->put("sessioneditTF",$cart);
				return redirect('edittfpembelian');
			}
		}
	}
    
    public function savetfpembelian(Request $request){
		if($request->input("btncancels")) {
			$request->session()->forget('notaDTF');
			return $this->viewtfpembelian();
		}else if($request->input("btnupdateTF")){
			$update = tfpembelian::find($request->txtupnonotaTF);
			$update->kodesupplier 		= $request->txtupkodesupplierTF;
			$update->tglpembelianTF 	= $request->txtuptglpembelianTF;
			$update->statusTF 			= $request->txtupstatusTF;
			$update->jenispembayaranTF 	= $request->txtupjenispembayaranTF;
			$update->save();
			$tempss2 = $request->txtupnomornotaDBJ;
			$temps3 = session()->get('notaDTF');
			// dd($temps3);
			for($i=0; $i< count($temps3); $i++){
				$update1 = detailtfpembelian::find($request['txtupnonotaDTF'.$temps3[$i]]);
				$update1->barangbakuDTFPembelian 		= $request['txtupbarangbakuDTF'.$temps3[$i]];
				$update1->hargaDTFPembelian 			= $request['txthargaDTF'.$temps3[$i]];
				$update1->qtyDTFPembelian				= $request['txtupqtyDTF'.$temps3[$i]];
				$update1->grandtotalDTF 				= $request['txtupgrandDTF'.$temps3[$i]];
				$update1->nonotaTFPembelian 			= $request->txtupnonotaTF;
				$update1->save();
			}
			Alert::success('Success', 'Success Message');
			$request->session()->forget('notaDTF');
			return redirect('viewtfpembelian');
		}else if($request->input("btnInsert")){
			$rules = [
				'txtnonotaTFPembelian'	=> 'required',
				'txtkodesupplierTF'		=> 'required',
				'txttglpembelianTF'		=> 'required',
				'txtstatusTF'			=> 'required',
				'txtjenispembayaranTF'	=> 'required'
			];
			$customeMessage = [
				'txtnonotaTFPembelian.required'	=> 'Nomor Nota tidak boleh kosong',
				'txtkodesupplierTF.required'	=> 'kode barang tidak boleh kosong',
				'txttglpembelianTF.required'	=> 'Tanggal tidak boleh kosong',
				'txtstatusTF.required'			=> 'Status tidak boleh kosong',
				'txtjenispembayaranTF.required'	=> 'Jenis Pembayaran tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('tfpembelian')->withErrors($valid)->withInput();
			}else{
				$txtnonotaTFPembelian	= $request->txtnonotaTFPembelian;
				$txtkodesupplierTF		= $request->txtkodesupplierTF;
				$txttglpembelianTF		= $request->txttglpembelianTF;
				$txtstatusTF			= "AKTIF";
				$txtjenispembayaranTF	= $request->txtjenispembayaranTF;

				$adduser = new tfpembelian();
				$adduser->insertdata($txtnonotaTFPembelian,$txtkodesupplierTF,$txttglpembelianTF,$txtstatusTF,$txtjenispembayaranTF);
				$txtnonotaDTFPembelian	= detailtfpembelian::all()->count()+1;
				$somedataasd 			= $request->somedataasd;
				$cartDPS = array();
				if(session()->get("cartDPS"))
				{
					$cartDPS = session()->get("cartDPS");
				}
				for($i= 0;$i < $somedataasd; $i++){
					if($txtnonotaDTFPembelian == 0)
					{
						$txtnonotaDTFPembelian	= detailtfpembelian::all()->count();
					}
					else
					{
						$txtnonotaDTFPembelian	= detailtfpembelian::all()->count()+1;
					}
					$txtbarangbakuDTFPembelian	= $cartDPS[$i]['kodebarang'];
					$txtqtyDTFPembelian			= $request['txtqtyDTFPembelian'.$txtbarangbakuDTFPembelian];//gantivariablealaCW
					$txthargaDTFPembelian		= $cartDPS[$i]['harga'];
					$txtgrandtotalDTF			= $request['txtgrandtotalDTF'.$txtbarangbakuDTFPembelian];
					$txttxtnonotaTFPembelian	= $txtnonotaTFPembelian;
					$adddetailproduksi 			= new detailtfpembelian();
					$adddetailproduksi->insertdata($txtnonotaDTFPembelian,$txtbarangbakuDTFPembelian,$txtqtyDTFPembelian,$txthargaDTFPembelian,$txtgrandtotalDTF,$txttxtnonotaTFPembelian);			
					Alert::success('Success Title', 'Success Message');
				}
				$request->session()->forget('cartDPS');
				return redirect('viewtfpembelian');
			}
		}
	}

	function addtocartDPS($kode)
	{
		$cart = array();
		$databarang = [];
		$jum = 0;
		$getbarang			= new barang();
		$data['databarang']	= $getbarang->all();
		if(session()->get('cartDPS'))
		{
			$cart	= session()->get('cartDPS');
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
				session()->put("cartDPS",$cart);
				echo "sukses";
				return redirect('tfpembelian');
			}
		}
	}
}
