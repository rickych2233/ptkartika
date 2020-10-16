<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailpenerimaanbb extends Model
{
    public $table       = 'detailpenerimaanbb';
    public $primaryKey  = 'nonotaDPBB';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotaDPBB, $txtnamabarangDPBB, $txtsatuaanDPBB, $txthargaDPBB, $qtypenerimaanBB, $qtypemesananBB,$nonotapenerimaanBB)
    {
        $insertuser                     = new detailpenerimaanBB(); 
        $insertuser->nonotaDPBB         = $txtnonotaDPBB; 
        $insertuser->namabarangDPBB     = $txtnamabarangDPBB;
        $insertuser->satuaanDPBB        = $txtsatuaanDPBB; 
        $insertuser->hargaDPBB          = $txthargaDPBB; 
        $insertuser->qtypenerimaanBB    = $qtypenerimaanBB;
        $insertuser->qtypemesananBB     = $qtypemesananBB;
        $insertuser->nonotapenerimaanBB = $nonotapenerimaanBB; 
        $insertuser->save(); 
    }
}
