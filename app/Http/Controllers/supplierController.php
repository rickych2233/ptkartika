<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\supplier;
use Illuminate\Support\Facades\DB;

class supplierController extends Controller
{
	public function newsupplier(){
		$newsupplier 				= new supplier();
		$data['datasupplier']   	= $newsupplier->all();
		return view("newsupplier")->with($data);
	}

	public function getsupplier() {	
		$users = supplier::where('kodesupplier','>=','S001')->paginate(5);
		return view("supplier",['datasupplier'=>$users]);
	}
	
	public function savesupplier(Request $request){
		if($request->input("btncancels")) {
			return $this->getsupplier();
		}
		else if($request->input("btnEditsupplier")){
			$update = supplier::find($request->txtupkodesupplier);
			$update->namasupplier 		= $request->txtupnamasupplier;
			$update->nomorhpsupplier 	= $request->txtuphp;
			$update->alamatsupplier 	= $request->txtupalamat;
			$update->statussupplier 	= $request->txtupstatus;
			$update->save();
			return redirect('supplier');
		}
		else if($request->input("btnInsert")){
			$rules = [
				'txtkodesupplier'		=> 'required',
				'txtnamasupplier'		=> 'required',
				'txtnomorhpsupplier'	=> 'required',
				'txtalamatsupplier'		=> 'required',
				'txtstatussupplier'		=> 'required'
			];
			$customeMessage = [
				'txtkodesupplier.required'	    => 'Username tidak boleh kosong',
				'txtnamasupplier.required'		=> 'Email tidak boleh kosong',
				'txtnomorhpsupplier.required'	=> 'Password tidak boleh kosong',
				'txtalamatsupplier.required'    => 'Nama tidak boleh kosong',
				'txtstatussupplier.required'	=> 'Alamat tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('newsupplier')->withErrors($valid)->withInput();
			}else{
				$txtkodesupplier		= $request->txtkodesupplier;
				$txtnamasupplier		= strtoupper($request->txtnamasupplier);
				$txtnomorhpsupplier		= $request->txtnomorhpsupplier;
				$txtalamatsupplier	    = strtoupper($request->txtalamatsupplier);
				$txtstatussupplier		= $request->txtstatussupplier;
				
				$adduser = new supplier();
				$adduser->insertdata($txtkodesupplier,$txtnamasupplier,$txtnomorhpsupplier,$txtalamatsupplier,$txtstatussupplier);
				$sccmsg = "database insert"; 
				Alert::success('Success Title', 'Success Message');
				return redirect('supplier');
			}
		}
	}
}
