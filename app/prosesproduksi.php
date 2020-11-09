<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use DB; 

class prosesproduksi extends Model
{
    public $table       = 'prosesproduksi';
    public $primaryKey  = 'nonotaPP';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotaPP, $txttglPP, $txtbarangjadiPP, $txtqtyhasilPP)
    {
        $insertuser                 = new prosesproduksi(); 
        $insertuser->nonotaPP       = $txtnonotaPP; 
        $insertuser->tglPP          = $txttglPP; 
        $insertuser->kodebarang     = $txtbarangjadiPP; 
        $insertuser->qtyhasilPP     = $txtqtyhasilPP; 
        $insertuser->save(); 
    }

    public function gettampilproduksi($tgldari,$tglsampai)
    {
        $data = prosesproduksi::select(DB::raw("kodebarang,qtyhasilPP"))
        ->whereBetween("tglPP",[date($tgldari),date($tglsampai)])
        ->get();
        return $data;
    }

    public function getproduksi($bulanproduksi)
    {
        $data = prosesproduksi::select(DB::raw("kodebarang,qtyhasilPP"))
        ->whereMonth("tglPP",'=',$bulanproduksi)
        ->get();
        return $data;
    }
}
