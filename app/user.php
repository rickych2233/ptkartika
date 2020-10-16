<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public $table       = 'user';
    public $primaryKey  = 'username';
    public $incrementing= false;
    public $timestamps  =  false;


    public function insertdata($txtPegawaiusername, $txtPegawaiemail, $txtPegawaipassword, $txtPegawainama, $txtPegawaialamat, $txtPegawaitelepon, $txtPegawaihandphone, $txtPegawainoktp, $txtPegawairole, $txtPegawaistatus)
    {
        $insertuser             = new user(); 
        $insertuser->username   = $txtPegawaiusername; 
        $insertuser->email      = $txtPegawaiemail; 
        $insertuser->password   = $txtPegawaipassword; 
        $insertuser->nama       = $txtPegawainama; 
        $insertuser->alamat     = $txtPegawaialamat; 
        $insertuser->telepon    = $txtPegawaitelepon; 
        $insertuser->handphone  = $txtPegawaihandphone; 
        $insertuser->noktp      = $txtPegawainoktp;
        $insertuser->role       = $txtPegawairole; 
        $insertuser->status     = $txtPegawaistatus;
        $insertuser->save(); 
    }

    public function getstatususer($restore)
    {
        $data = user::select("user.*")->where("status","=",$restore)->get();
        return $data;
    }

    public function ceklogin($username,$password){
        $data = user::select("user.*")
                ->where("username","=",$username)
                ->where("password","=",$password)
                ->get();
        return $data;
    }
}
