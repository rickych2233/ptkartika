<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailpengirimanbarang extends Model
{
    public $table       = 'detailpengirimanbarang';
    public $primaryKey  = 'nonotadpengirimanB';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotadpengirimanB, $txtkodebarang ,$txtjumlahbarang ,$txtnonotapengirimanB)
    {
        $insertuser                             = new detailpengirimanbarang(); 
        $insertuser->nonotadpengirimanB         = $txtnonotadpengirimanB; 
        $insertuser->kodebarang                 = $txtkodebarang;
        $insertuser->jumlahbarang               = $txtjumlahbarang;
        $insertuser->nonotapengirimanB          = $txtnonotapengirimanB;
        $insertuser->save(); 
    }
}
