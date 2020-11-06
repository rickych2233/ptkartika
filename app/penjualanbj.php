<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualanbj extends Model
{
    public $table       = 'penjualanbj';
    public $primaryKey  = 'nonotapenjualanBJ';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotapenjualanBJ, $txtkodecustomerBJ, $txttglpembelianBJ, $txtstatusBJ, $txtjenispembayaranBJ, $txtstatuspesanBJ)
    {
        $insertuser                             = new penjualanbj(); 
        $insertuser->nonotapenjualanBJ          = $txtnonotapenjualanBJ; 
        $insertuser->kodecustomer               = $txtkodecustomerBJ; 
        $insertuser->tglpembelianBJ             = $txttglpembelianBJ; 
        $insertuser->statusBJ                   = $txtstatusBJ; 
        $insertuser->jenispembayaranBJ          = $txtjenispembayaranBJ;
        $insertuser->statuspesanBJ          	= $txtstatuspesanBJ;
        $insertuser->save(); 
    }
    
}
