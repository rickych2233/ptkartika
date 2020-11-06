<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class returpengiriman extends Model
{
    public $table       = 'returpengiriman';
    public $primaryKey  = 'nomorretur';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnomorretur, $txtkodebarang, $txttglretur, $txtjumlahbarang, $txtketerangan,$txtnonotapengirimanB)
    {
        $insertuser                        = new returpengiriman(); 
        $insertuser->nomorretur            = $txtnomorretur; 
        $insertuser->kodebarang            = $txtkodebarang; 
        $insertuser->tglretur              = $txttglretur;
        $insertuser->jumlahbarang          = $txtjumlahbarang; 
        $insertuser->keterangan            = $txtketerangan;
        $insertuser->nonotapengirimanB     = $txtnonotapengirimanB;
        $insertuser->save(); 
    }
}
