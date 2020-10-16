<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\penyesuaianstok;
use App\barang;

class penyesuaianstokController extends Controller
{
	//AJAX
	public function getstokbarang(Request $request){
		$getstok	= new barang();
		$kodebarang = $request->kodebarang;
		$data		= $getstok->getpenyesuaianstok($kodebarang);
		echo json_encode($data);
	}


	//new get and save view
	public function viewpenyesuaianstok(){
		$getpenyesuaianstok 	    	= new penyesuaianstok();
		$data['datapenyesuaianstok']   	= $getpenyesuaianstok->all();
		return view("viewpenyesuaianstok")->with($data);
	}


	public function newpenyesuaianstok(){
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->all();

		$getpenyesuaianstok 	    	= new penyesuaianstok();
		$data['datapenyesuaianstok']   	= $getpenyesuaianstok->all();
		return view("penyesuaianstok")->with($data);
	}

	public function getpenyesuaianstok() {	
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->all();

		$getpenyesuaianstok 	    	= new penyesuaianstok();
		$data['datapenyesuaianstok']   	= $getpenyesuaianstok->all();
		return view("penyesuaianstok")->with($data);
	}

	public function savepenyesuaianstok(Request $request) {
		if($request->input("btncancels")) {
			return $this->getpenyesuaianstok();
		}
		else if($request->input("btnupdate")){
			$update = penyesuaianstok::find($request->txtupnonotaPS);
			$update->kodebarang 	= $request->txtupkodebarang;
			$update->stokNow 		= $request->txtupstokNow;
			$update->stokRevisi 	= $request->txtupstokRevisi;
			$update->keterangan 	= $request->txtupketerangan;
			$update->save();
			return redirect('viewpenyesuaianstok');
		}
		else if($request->input("btnInsert")){
			$rules = [
				'txtnonotaPS'			=> 'required',
				'txtkodebarangSP'		=> 'required',
				'txtstokskrngPS'		=> 'required',
				'txtrevisiPS'			=> 'required',
				'txtketeranganPS'		=> 'required'
			];
			$customeMessage = [
				'txtnonotaPS.required'		=> 'nonota tidak boleh kosong',
				'txtkodebarangSP.required'	=> 'id history tidak boleh kosong',
				'txtstokskrngPS.required'	=> 'kode barang tidak boleh kosong',
				'txtrevisiPS.required'		=> 'tanggal history tidak boleh kosong',
				'txtketeranganPS.required'	=> 'tanggal Berlaku tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('penyesuaianstok')->withErrors($valid)->withInput();
			}
			else{
				$txtnonotaPS		= $request->txtnonotaPS;
				$txtkodebarangSP	= $request->txtkodebarangSP;
				$txtstokskrngPS		= $request->txtstokskrngPS;
				$txtrevisiPS		= $request->txtrevisiPS;
				$txtketeranganPS	= $request->txtketeranganPS;

				$adduser = new penyesuaianstok();
				$adduser->insertdata($txtnonotaPS,$txtkodebarangSP,$txtstokskrngPS,$txtrevisiPS,$txtketeranganPS);
				$sccmsg = "database insert"; 
				Alert::success('Success Title', 'Success Message');
				return redirect('viewpenyesuaianstok');
			}
		}
	}
}
