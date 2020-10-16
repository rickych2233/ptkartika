<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\historyharga;
use App\barang;

class historyhargaController extends Controller
{
	//AJAX
	public function gethargabarang(Request $request){
		$getHistory	= new historyharga();
		$kodebarang = $request->kodebarang;
		$data		= $getHistory->getbaranghistory($kodebarang);
		echo json_encode($data);
	}


	//new get and save 
	public function newhistoryharga(){
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->all();

		$gethistoryharga 	        = new historyharga();
		$data['datahistoryharga']   = $gethistoryharga->all();
		return view("historyharga")->with($data);
	}

	public function gethistoryharga() {	
		$getbarang 			= new barang();
		$data['databarang'] = $getbarang->all();

		$gethistoryharga 	        = new historyharga();
		$data['datahistoryharga']   = $gethistoryharga->all();
		return view("historyharga")->with($data);
	}

	public function savehistoryharga(Request $request) {
		if($request->input("btncancels")) {
			return $this->gethistoryharga();
		}
		else if($request->input("btnsimpanHH")){
			$rules = [
				'txtidhistoryHH'		=> 'required',
				'txtkodebarangHH'		=> 'required',
				'txttanggalhistoryHH'	=> 'required',
				'txttanggalberlakuHH'	=> 'required',
				'txthargajualHH'		=> 'required'
			];
			$customeMessage = [
				'txtidhistoryHH.required'		=> 'id history tidak boleh kosong',
				'txtkodebarangHH.required'		=> 'kode barang tidak boleh kosong',
				'txttanggalhistoryHH.required'	=> 'tanggal history tidak boleh kosong',
				'txttanggalberlakuHH.required'	=> 'tanggal Berlaku tidak boleh kosong',
				'txthargajualHH.required'		=> 'harga jual tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				$message = "message";
				echo "<script type='text/javascript'>alert('$message');</script>";
				return redirect('historyharga')->withErrors($valid)->withInput();
			}else{
				$txtidhistoryHH			= $request->txtidhistoryHH;
				$txtkodebarangHH		= $request->txtkodebarangHH;
				$txttanggalhistoryHH	= $request->txttanggalhistoryHH;
				$txttanggalberlakuHH	= $request->txttanggalberlakuHH;
				$txthargajualHH			= $request->txthargajualHH;

				$adduser = new historyharga();
				$adduser->insertdata($txtidhistoryHH,$txtkodebarangHH,$txttanggalhistoryHH,$txttanggalberlakuHH,$txthargajualHH);
				$sccmsg = "database insert"; 
				Alert::success('Success Title', 'Success Message');
				return redirect('historyharga');
			}
		}
	}
}
