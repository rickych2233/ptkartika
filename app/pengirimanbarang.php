<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengirimanbarang extends Model
{
    public $table       = 'pengirimanbarang';
    public $primaryKey  = 'nonotapengirimanB';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtnonotapengirimanB, $txttglpengirimanB, $txtusername, $txtkodecustomer)
    {
        $insertuser                             = new pengirimanbarang(); 
        $insertuser->nonotapengirimanB          = $txtnonotapengirimanB; 
        $insertuser->tglpengirimanB             = $txttglpengirimanB; 
        $insertuser->username                   = $txtusername;
        $insertuser->kodecustomer               = $txtkodecustomer;
        $insertuser->save(); 
    }
}
