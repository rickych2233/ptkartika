<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailtfpembelian extends Model
{
    public $table       = 'detailtfpembelian';
    public $primaryKey  = 'nonotaDTFPembelian';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotaDTFPembelian, $txtbarangbakuDTFPembelian, $txtqtyDTFPembelian, $txthargaDTFPembelian,$txtgrandtotalDTF,$txtnonotaTFPembelian)
    {
        $insertuser                          = new detailtfpembelian(); 
        $insertuser->nonotaDTFPembelian      = $txtnonotaDTFPembelian; 
        $insertuser->kodebarang              = $txtbarangbakuDTFPembelian; 
        $insertuser->qtyDTFPembelian         = $txtqtyDTFPembelian; 
        $insertuser->hargaDTFPembelian       = $txthargaDTFPembelian;
        $insertuser->grandtotalDTF           = $txtgrandtotalDTF;
        $insertuser->nonotaTFPembelian       = $txtnonotaTFPembelian; 
        $insertuser->save(); 
    }
}
