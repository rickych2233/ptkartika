<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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
        $insertuser->kodebarang         = $txtnamabarangDBJ;
        $insertuser->satuaanDBJ         = $txtsatuaanDBJ; 
        $insertuser->hargaDBJ           = $txthargaDBJ;
        $insertuser->qtyDBJ             = $txtqtyDBJ;
        $insertuser->grandtotalDBJ      = $txtgrandtotalDBJ;
        $insertuser->statusDBJ          = $txtstatusDBJ;
        $insertuser->historyDBJ         = $txthistoryDBJ;
        $insertuser->nonotaBJ           = $txtnonotaBJFK;
        $insertuser->save(); 
    }
    
    public function getdetail($namabarang)
    {
        $data = detailpenjualanbj::select("detailpenjualanbj.*")->where("nonotaDBJ","=",$namabarang)->get();
        return $data;
    }
    
    public function getproduksi($tahunperbandingan)
    {
        $data = DB::table('detailpenjualanbj')
        ->join('penjualanbj','penjualanbj.nonotapenjualanBJ','=','detailpenjualanbj.nonotaBJ')
        ->select('kodebarang','qtyDBJ')
        ->whereYear('penjualanbj.tglpembelianBJ', '=', $tahunperbandingan)
        ->get();
        return $data;
    }
}
