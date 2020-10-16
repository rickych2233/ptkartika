<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailprosesproduksi extends Model
{
    public $table       = 'detailprosesproduksi';
    public $primaryKey  = 'nonotaDPP';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotaDPP, $txtbarangbakuDPP, $txtqtyDPP, $txthargaDPP, $txtnonotaPP)
    {
        $insertuser                 = new detailprosesproduksi(); 
        $insertuser->nonotaDPP      = $txtnonotaDPP; 
        $insertuser->kodebarang     = $txtbarangbakuDPP; 
        $insertuser->qtyDPP         = $txtqtyDPP; 
        $insertuser->hargaDPP       = $txthargaDPP; 
        $insertuser->nonotaPP       = $txtnonotaPP;
        $insertuser->save(); 
    }
}
