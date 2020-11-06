<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\pengirimanbarang;
use App\user;
use App\customer;
use App\barang;
use App\detailpengirimanbarang;
use App\returpengiriman;

class pengirimanController extends Controller
{
    public function viewpengiriman(){
		$pengirimanbarang 				    = new pengirimanbarang();
        $data['datapengirimanbarang'] 	    = $pengirimanbarang->all();
		return view("viewpengiriman")->with($data);
	}
	
	public function listreturbarang(){
        $barang 				            = new returpengiriman();
		$data['detailretur'] 	            = $barang->all();
        return view("listreturbarang")->with($data);
    }
    
    public function newpengiriman(){
		
        $barang 				            = new barang();
        $data['databarang'] 	            = $barang->all();
        $customer 				            = new customer();
        $data['datacustomer'] 	            = $customer->all();
        $user 				                = new user();
        $data['datauser'] 	                = $user->all();
        $pengirimanbarang 				    = new pengirimanbarang();
        $data['datapengirimanbarang'] 	    = $pengirimanbarang->all();
		return view("newpengiriman")->with($data);
    }

    public function newbarangbuatpengiriman(){
        $barang 				            = new barang();
        $data['databarang'] 	            = $barang->all();
        return view("newbarangbuatpengiriman")->with($data);
	}

	

	public function returpengiriman(){
        $barang 				            			= new detailpengirimanbarang();
		$data['detailpengirimanbarang'] 	            = $barang->all();
		$returnpengiriman 				            	= new returpengiriman();
        $data['detailreturnpengiriman'] 	           	= $returnpengiriman->all();
        return view("returpengiriman")->with($data);
    }


	function updatepengirimanbarang($data1)
	{
		$cart = array();
		$dataPP = [];
		$jum = 0;
		$getpengiriman				= new pengirimanbarang();
		$data['datapengiriman']		= $getpengiriman->all();
		if(session()->get('sessionpengiriman'))
		{
			$cart	= session()->get('sessionpengiriman');
			$jum	= count($cart);
		}
		foreach($data['datapengiriman'] as $row)
		{
			if($row->nonotapengirimanB == $data1)
			{
				$cart[$jum]['nonotapengirimanB']		 	= $row->nonotapengirimanB;
				session()->put("sessionpengiriman",$cart);
				return redirect('detailpengirimanbarang');
			}
		}
	}

	function returpengirimanbarang($data2)
	{
		$cart = array();
		$dataPP = [];
		$jum = 0;
		$getpengiriman				= new pengirimanbarang();
		$data['datapengiriman']		= $getpengiriman->all();
		if(session()->get('sessionretur'))
		{
			$cart	= session()->get('sessionretur');
			$jum	= count($cart);
		}
		foreach($data['datapengiriman'] as $row)
		{
			if($row->nonotapengirimanB == $data2)
			{
				$cart[$jum]['nonotapengirimanB']		 	= $row->nonotapengirimanB;
				session()->put("sessionretur",$cart);
				return redirect('returpengiriman');
			}
		}
	}


    function addtocartpengirimanbarang($kode)
	{
		$cart = array();
		$databarang = [];
		$jum = 0;
		$getbarang			= new barang();
		$data['databarang']	= $getbarang->all();
		if(session()->get('cartpe'))
		{
			$cart	= session()->get('cartpe');
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
				session()->put("cartpe",$cart);
				echo "sukses";
				return redirect('newpengiriman');
			}
		}
	}
	
	public function detailpengiriman(){
		$detailpengiriman 				= new detailpengirimanbarang();
        $data['datapengiriman'] 	    = $detailpengiriman->all();
		return view("detailpengiriman")->with($data);
	}
	
	public function detailpengirimanbarang(){
		$barang 				            = new barang();
        $data['databarang'] 	            = $barang->all();
        $customer 				            = new customer();
        $data['datacustomer'] 	            = $customer->all();
        $user 				                = new user();
        $data['datauser'] 	                = $user->all();
		$pengirimanbarang 					= new pengirimanbarang();
        $data['datapengiriman'] 	    	= $pengirimanbarang->all();
		$detailpengiriman 					= new detailpengirimanbarang();
        $data['datadetailpengiriman'] 	    = $detailpengiriman->all();		
		return view("detailpengirimanbarang")->with($data);
	}

	public function savepengirimanbarang(Request $request){
        if($request->input("btncancels")) {
			$request->session()->forget('sessionpengiriman');
			$request->session()->forget('sessionretur');
			$request->session()->forget('cartpe');
			return $this->viewpengiriman();
		}else if($request->input("btnretur")){
			$rules = [
				'txtnomorretur'			=> 'required',
				'txtkodebarang'			=> 'required',
				'txttglretur'			=> 'required',
				'txtjumlahbarang'		=> 'required',
				'txtketerangan'			=> 'required',
				'txtnonotapengirimanB'	=> 'required'
			];
			$customeMessage = [
				'txtnomorretur.required'		=> 'Nomor Retur tidak boleh kosong',
				'txtkodebarang.required'		=> 'kode barang tidak boleh kosong',
				'txttglretur.required'			=> 'Tanggal retur tidak boleh kosong',
				'txtjumlahbarang.required'		=> 'Jumlah barang tidak boleh kosong',
				'txtketerangan.required'		=> 'keterangan tidak boleh kosong',
				'txtnonotapengirimanB.required'	=> 'nonotapengiriman tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('returpengiriman')->withErrors($valid)->withInput();
			}else{
				$txtnomorretur			= $request->txtnomorretur;
				$txtkodebarang			= $request->txtkodebarang;
				$txttglretur			= $request->txttglretur;
				$txtjumlahbarang		= $request->txtjumlahbarang;
				$txtketerangan	    	= $request->txtketerangan;
				$txtnonotapengirimanB	= $request->txtnonotapengirimanB;
				$adduser                = new returpengiriman();
				$adduser->insertdata($txtnomorretur,$txtkodebarang,$txttglretur,$txtjumlahbarang,$txtketerangan,$txtnonotapengirimanB);
				Alert::success('Success', 'Success Message');
				$request->session()->forget('sessionretur');
				return redirect('viewpengiriman');
			}
		}else if($request->input("btnupdate")){
			$update = pengirimanbarang::find($request->txtnonotapengirimanB);
			$update->tglpengirimanB 		= $request->txttglpengirimanB;
			$update->username	 			= $request->txtusername;
			$update->kodecustomer 			= $request->txtkodecustomer;
			$update->save();
			// $tempss2 = $request->txtupnomornotaDBJ;
			$temps3 = session()->get('notaDpengiriman');
			for($i=0; $i< count($temps3); $i++){
				$update1 					= detailpengirimanbarang::find($request['txtupnonota'.$temps3[$i]]);
				$update1->jumlahbarang 		= $request['txtupjmlbarang'.$temps3[$i]];
				$update1->save();
			}
			Alert::success('Success', 'Success Message');
			$request->session()->forget('notaDpengiriman');
			return redirect('viewpengiriman');
		}else if($request->input("btninsert")){
			$rules = [
				'txtnonotapengirimanB'	=> 'required',
				'txttglpengirimanB'		=> 'required',
				'txtusername'		    => 'required',
				'txtkodecustomer'		=> 'required'
			];
			$customeMessage = [
				'txtnonotapengirimanB.required'	=> 'Nomor Nota tidak boleh kosong',
				'txttglpengirimanB.required'	=> 'Tanggal tidak boleh kosong',
				'txtusername.required'	        => 'Sales Penjualan tidak boleh kosong',
				'txtkodecustomer.required'		=> 'Customer tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('viewpengiriman')->withErrors($valid)->withInput();
			}else{
				$txtnonotapengirimanB	= $request->txtnonotapengirimanB;
				$txttglpengirimanB		= $request->txttglpengirimanB;
				$txtusername		    = $request->txtusername;
				$txtkodecustomer	    = $request->txtkodecustomer;
				$adduser                = new pengirimanbarang();
				$adduser->insertdata($txtnonotapengirimanB,$txttglpengirimanB,$txtusername,$txtkodecustomer);
				$txtnonotadpengirimanB	= detailpengirimanbarang::all()->count()+1;
				$somedataasd 			= $request->somed;
				$cartpe = array();
				if(session()->get("cartpe"))
				{
					$cartpe = session()->get("cartpe");
				}
				for($i= 0;$i < $somedataasd; $i++){
					if($txtnonotadpengirimanB == 0)
					{
						$txtnonotadpengirimanB	= detailpengirimanbarang::all()->count();
					}
					else
					{
						$txtnonotadpengirimanB	= detailpengirimanbarang::all()->count()+1;
					}
					$txtkodebarang			    = $cartpe[$i]['kodebarang'];
					$txtjumlahbarang			= $request['txtjumlahbarang'.$txtkodebarang];
					$txtnonotapengirimanB	    = $txtnonotapengirimanB;
					$adddetailproduksi 			= new detailpengirimanbarang();
					$adddetailproduksi->insertdata($txtnonotadpengirimanB,$txtkodebarang,$txtjumlahbarang,$txtnonotapengirimanB);			
				}
				Alert::success('Success', 'Success Message');
				$request->session()->forget('cartpe');
				return redirect('viewpengiriman');
			}
		}
    }
}
