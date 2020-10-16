<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
}
