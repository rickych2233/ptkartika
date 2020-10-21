<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailpenjualanbj extends Model
{
    public $table       = 'detailpenjualanbj';
    public $primaryKey  = 'nonotaDBJ';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotaDBJ, $txtnamabarangDBJ, $txtsatuaanDBJ, $txthargaDBJ, $txtqtyDBJ, $txtgrandtotalDBJ, $txtstatusDBJ, $txthistoryDBJ,$txtnonotaBJFK)
    {
        $insertuser                     = new detailpenjualanbj(); 
        $insertuser->nonotaDBJ          = $txtnonotaDBJ; 
        $insertuser->namabarangDBJ      = $txtnamabarangDBJ;
        $insertuser->satuaanDBJ         = $txtsatuaanDBJ; 
        $insertuser->hargaDBJ           = $txthargaDBJ;
        $insertuser->qtyDBJ             = $txtqtyDBJ;
        $insertuser->grandtotalDBJ      = $txtgrandtotalDBJ;
        $insertuser->statusDBJ          = $txtstatusDBJ;
        $insertuser->historyDBJ         = $txthistoryDBJ;
        $insertuser->nonotaBJFK         = $txtnonotaBJFK;
        $insertuser->save(); 
    }
    
    public function getdetail($namabarang)
    {
        $data = detailpenjualanbj::select("detailpenjualanbj.*")->where("nonotaDBJ","=",$namabarang)->get();
        return $data;
    }
}
