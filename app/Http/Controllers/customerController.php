<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\customer;

class customerController extends Controller
{
	public function newcustomer(){
		$getcustomer 			= new customer();
		$data['datacustomer'] 	= $getcustomer->all();
		return view("newcustomer")->with($data);
	}

	public function getcustomer() {	
		$getcustomer 			= new customer();
		$data['datacustomer'] 	= $getcustomer->all();
		return view("customer")->with($data);
	}
	
	public function savecustomer(Request $request){
		if($request->input("btncancels")) {
			return $this->getcustomer();
		}
		else if($request->input("btnedituser")){
			$update = customer::find($request->txtupkodecustomer);
			$update->namatoko 			= $request->txtupnamatoko;
			$update->contactperson 		= $request->txtupcontactperson;
			$update->alamat 			= $request->txtupalamat;
			$update->kota 				= $request->txtupkota;
			$update->ktp 				= $request->txtupktp;
			$update->hp 				= $request->txtuphp;
			$update->status 			= $request->txtupstatus;
			$update->tipepembayaran 	= $request->txtuptipepembayaran;
			$update->save();
			return redirect('customer');
		}
		else if($request->input("btnInsert")){
			$rules = [
				//'txtkodecustomer'   	=> 'required',
				'txtnamatoko'   		=> 'required',
				'txtcontactperson'  	=> 'required',
				'txtalamat'     		=> 'required',
				'txtkota'       		=> 'required',
				'txtktp'	       		=> 'required',
				'txthp'             	=> 'required',
				'txtstatus'		        => 'required',
				'txttipepembayaran'		=> 'required'
			];
			$customeMessage = [
				//'txtkodecustomer.required'	=> 'Username tidak boleh kosong',
				'txtnamatoko.required'		    => 'Nama Toko tidak boleh kosong',
				'txtcontactperson.required'	    => 'Kontak person tidak boleh kosong',
				'txtalamat.required'		    => 'Alamat tidak boleh kosong',
				'txtkota.required'		        => 'Kota asal tidak boleh kosong',
				'txthp.required'	            => 'Handphone tidak boleh kosong',
				'txtstatus.required'		    => 'Status tidak boleh kosong',
				'txttipepembayaran.required'	=> 'tipe Pembayaran tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('newcustomer')->withErrors($valid)->withInput();
			}else{
				$txtkodecustomer		= $request->txtkodecustomer;
				$txtnamatoko    		= $request->txtnamatoko;
				$txtcontactperson		= $request->txtcontactperson;
				$txtalamat  			= $request->txtalamat;
				$txtkota		        = $request->txtkota;
				$txtktp					= $request->txtktp;
				$txthp	                = $request->txthp;
				$txtstatus	        	= $request->txtstatus;
				$txttipepembayaran		= $request->txttipepembayaran;
				
				$adduser = new customer();
				$adduser->insertdata($txtkodecustomer,$txtnamatoko,$txtcontactperson,$txtalamat,$txtkota,$txtktp,$txthp,$txtstatus,$txttipepembayaran);
				$sccmsg = "database insert";
				Alert::success('Success Title', 'Success Message');
				return redirect('customer');
			}
		}
	}
}
