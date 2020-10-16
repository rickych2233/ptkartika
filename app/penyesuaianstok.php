<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penyesuaianstok extends Model
{
    public $table       = 'penyesuaianstok';
    public $primaryKey  = 'nonotaPS';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotaPS,$txtkodebarangSP, $txtstokskrngPS, $txtrevisiPS, $txtketeranganPS)
    {
        $insertuser               = new penyesuaianstok(); 
        $insertuser->nonotaPS     = $txtnonotaPS;
        $insertuser->kodebarang   = $txtkodebarangSP; 
        $insertuser->stokNow      = $txtstokskrngPS; 
        $insertuser->stokRevisi   = $txtrevisiPS; 
        $insertuser->keterangan   = $txtketeranganPS; 
        $insertuser->save(); 
    }
}
