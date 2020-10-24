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

class pengirimanController extends Controller
{
    public function viewpengiriman(){
		$pengirimanbarang 				    = new pengirimanbarang();
        $data['datapengirimanbarang'] 	    = $pengirimanbarang->all();
		return view("viewpengiriman")->with($data);
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

	public function savepengirimanbarang(Request $request){
        if($request->input("btncancels")) {
			$request->session()->forget('cartpe');
			return $this->viewpengiriman();
		}else if($request->input("btndetail")){
			return $this->detailpengiriman();
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
