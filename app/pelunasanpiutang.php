<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelunasanpiutang extends Model
{
    public $table       = 'pelunasanpiutang';
    public $primaryKey  = 'nonotapelunasan';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotapelunasan, $txtsalespenjualan, $txtkodecustomer, $txttglpelunasan,$txtgrandtotal,$txtjumlahdibayar, $txtnonotapenjualanBJ)
    {
        $insertuser                             = new pelunasanpiutang(); 
        $insertuser->nonotapelunasan            = $txtnonotapelunasan; 
        $insertuser->username                   = $txtsalespenjualan; 
        $insertuser->kodecustomer               = $txtkodecustomer; 
        $insertuser->tglpelunasan               = $txttglpelunasan; 
        $insertuser->grandtotal                 = $txtgrandtotal;
        $insertuser->jumlahdibayar              = $txtjumlahdibayar;
        $insertuser->nonotapenjualanBJ          = $txtnonotapenjualanBJ;
        $insertuser->save(); 
    }
}
