<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penerimaanbb extends Model
{
    public $table       = 'penerimaanbb';
    public $primaryKey  = 'nonotapenerimaanBB';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($nonotapenerimaanBB, $txtsupplierpenerimaanBB, $txttglpenerimaanBB, $txtstatuspenerimaanBB,$txtjenispembayaranBB,$txttotalGrand)
    {
        $insertuser                             = new penerimaanbb(); 
        $insertuser->nonotapenerimaanBB         = $nonotapenerimaanBB; 
        $insertuser->kodesupplier               = $txtsupplierpenerimaanBB; 
        $insertuser->tglpenerimaanBB            = $txttglpenerimaanBB; 
        $insertuser->statuspenerimaanBB         = $txtstatuspenerimaanBB; 
        $insertuser->jenispembayaranBB          = $txtjenispembayaranBB;
        $insertuser->grandhargaBB               = $txttotalGrand;
        $insertuser->save(); 
    }
}
