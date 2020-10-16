<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\user;

class userController extends Controller
{
	public function newregisteruser(){
		$getuser 				= new user();
		$data['datauser'] 	= $getuser->getstatususer("AKTIF");
		return view("newregisteruser")->with($data);
	}

	public function getuser() {	
		$users = DB::table('user')->paginate(5);
		return view("user",['datauser'=>$users]);
	}
	
	public function saveregisteruser(Request $request){
		if($request->input("btncancels")) {
			$getuser 						= new user();
			$data['datauser'] 			= $getuser->getstatususer("AKTIF");
			return redirect('user')->with($data);
		}
		else if($request->input("btnrestore")){
			$datauser = user::where('status', '=', $restore )->paginate(5);
			return view('user',compact('datauser','restore'));
		}
		else if($request->input("btnEditcustomer")){
			$update = user::find($request->txtupusername);
			$update->email 			= $request->txtupemail;
			$update->password 		= $request->txtuppassword;
			$update->nama 			= $request->txtupnama;
			$update->alamat 		= $request->txtupalamat;
			$update->telepon 		= $request->txtuptelepon;
			$update->handphone 		= $request->txtuphandphone;
			$update->noktp 			= $request->txtupktp;
			$update->role 			= $request->txtuprole;
			$update->status 		= $request->txtupstatus;
			$update->save();
			return redirect('user');
		}
		else if($request->input("btnSignup")){
			$rules = [
				'txtPegawaiusername'	=> 'required',
				'txtPegawaiemail'		=> 'required',
				'txtPegawaipassword'	=> 'required',
				'txtPegawainama'		=> 'required',
				'txtPegawaialamat'		=> 'required',
				'txtPegawaitelepon'		=> 'required',
				'txtPegawaihandphone'	=> 'required',
				'txtPegawainoktp'		=> 'required',
				'txtPegawairole'		=> 'required',
				'txtPegawaistatus'		=> 'required'
			];
			$customeMessage = [
				'txtPegawaiusername.required'	=> 'Username tidak boleh kosong',
				'txtPegawaiemail.required'		=> 'Email tidak boleh kosong',
				'txtPegawaipassword.required'	=> 'Password tidak boleh kosong',
				'txtPegawainama.required'		=> 'Nama tidak boleh kosong',
				'txtPegawaialamat.required'		=> 'Alamat tidak boleh kosong',
				'txtPegawaitelepon.required'	=> 'Telepon tidak boleh kosong',
				'txtPegawaihandphone.required'	=> 'Handphone tidak boleh kosong',
				'txtPegawainoktp.required'		=> 'No. Ktp tidak boleh kosong',
				'txtPegawairole.required'		=> 'Role tidak boleh kosong',
				'txtPegawaistatus.required'		=> 'status tidak boleh kosong'
			];
			$valid = Validator::make($request->all(),$rules,$customeMessage);
			if($valid->fails()){
				return redirect('newregisteruser')->withErrors($valid)->withInput();
			}else{
				$txtPegawaiusername		= $request->txtPegawaiusername;
				$txtPegawaiemail		= $request->txtPegawaiemail;
				$txtPegawaipassword		= $request->txtPegawaipassword;
				$txtPegawainama			= $request->txtPegawainama;
				$txtPegawaialamat		= $request->txtPegawaialamat;
				$txtPegawaitelepon		= $request->txtPegawaitelepon;
				$txtPegawaihandphone	= $request->txtPegawaihandphone;
				$txtPegawainoktp		= $request->txtPegawainoktp;
				$txtPegawairole			= $request->txtPegawairole;
				$txtPegawaistatus		= $request->txtPegawaistatus;
				
				$adduser = new user();
				$adduser->insertdata($txtPegawaiusername,$txtPegawaiemail,$txtPegawaipassword,$txtPegawainama,$txtPegawaialamat,$txtPegawaitelepon,$txtPegawaihandphone,$txtPegawainoktp,$txtPegawairole,$txtPegawaistatus);
				$sccmsg = "database insert"; 
				Alert::success('Success Title', 'Success Message');
				return redirect('user');
			}
		}
	}
}
