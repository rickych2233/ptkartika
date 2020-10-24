<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengeluaranbarangjadi extends Model
{
    public $table       = 'pengeluaranbarangjadi';
    public $primaryKey  = 'nonotapengeluaranB';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotapengeluaranB, $txttglpengeluaranB, $txtusername, $txtketeranganpengeluaranB)
    {
        $insertuser                             = new pengeluaranbarangjadi(); 
        $insertuser->nonotapengeluaranB         = $txtnonotapengeluaranB; 
        $insertuser->tglpengeluaranB            = $txttglpengeluaranB; 
        $insertuser->username                   = $txtusername; 
        $insertuser->keteranganpengeluaranB     = $txtketeranganpengeluaranB; 
        $insertuser->save(); 
    }
}
