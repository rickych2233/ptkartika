<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tfpembelian extends Model
{
    public $table       = 'tfpembelian';
    public $primaryKey  = 'nonotaTFPembelian';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotaTFPembelian, $txtkodesupplierTF, $txttglpembelianTF, $txtstatusTF,$txtjenispembayaranTF)
    {
        $insertuser                             = new tfpembelian(); 
        $insertuser->nonotaTFPembelian          = $txtnonotaTFPembelian; 
        $insertuser->kodesupplier               = $txtkodesupplierTF; 
        $insertuser->tglpembelianTF             = $txttglpembelianTF; 
        $insertuser->statusTF                   = $txtstatusTF; 
        $insertuser->jenispembayaranTF          = $txtjenispembayaranTF;
        $insertuser->save(); 
    }

    public function namasupplier()
    {
        $data = supplier::select("tfpembelian.*","supplier.namasupplier")
                        ->join("supplier","supplier.kodesupplier", "=", "tfpembelian.kodesupplier")
                        ->get();
        return $data;
    }
}
