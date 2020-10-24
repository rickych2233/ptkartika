<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailpengeluaranbarangjadi extends Model
{
    public $table       = 'detailpengeluaranbarangjadi';
    public $primaryKey  = 'nonotadpengeluaranB';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotadpengeluaranB, $txtkodebarang, $txtjumlahpengeluaranB, $txtnonotapengeluaranB)
    {
        $insertuser                             = new detailpengeluaranbarangjadi(); 
        $insertuser->nonotadpengeluaranB        = $txtnonotadpengeluaranB; 
        $insertuser->kodebarang                 = $txtkodebarang; 
        $insertuser->jumlahpengeluaranB         = $txtjumlahpengeluaranB;
        $insertuser->nonotapengeluaranB         = $txtnonotapengeluaranB; 
        $insertuser->save(); 
    }
}
