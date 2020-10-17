<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public $table       = 'customer';
    public $primaryKey  = 'kodecustomer';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtkodecustomer, $txtnamatoko, $txtcontactperson, $txtalamat, $txtkota, $txtktp, $txthp, $txtstatus,$txttipepembayaran)
    {
        $counter                = customer::all()->count() + 1; 
        if($counter < 10)       { $txtkodecustomer = "C00".$counter; }
        else if($counter < 100) { $txtkodecustomer = "C0".$counter; }
        else                    { $txtkodecustomer = "C".$counter;  }
    
        $insert                 = new customer(); 
        $insert->kodecustomer   = $txtkodecustomer; 
        $insert->namatoko       = $txtnamatoko; 
        $insert->contactperson  = $txtcontactperson; 
        $insert->alamat         = $txtalamat; 
        $insert->kota           = $txtkota; 
        $insert->ktp            = $txtktp;
        $insert->hp             = $txthp; 
        $insert->status         = $txtstatus;
        $insert->tipepembayaran = $txttipepembayaran;
        $insert->save(); 
    }

    public function getkodecustomer($kodecustomer)
    {
        $data = customer::select("customer.*")->where("kodecustomer","=",$kodecustomer)->get();
        return $data;
    }
}
