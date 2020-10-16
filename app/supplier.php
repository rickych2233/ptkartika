<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    public $table       = 'supplier';
    public $primaryKey  = 'kodesupplier';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtkodesupplier, $txtnamasupplier, $txtnomorhpsupplier, $txtalamatsupplier, $txtstatussupplier)
    {
        $insertuser                        = new supplier(); 
        $insertuser->kodesupplier          = $txtkodesupplier; 
        $insertuser->namasupplier          = $txtnamasupplier; 
        $insertuser->nomorhpsupplier       = $txtnomorhpsupplier; 
        $insertuser->alamatsupplier        = $txtalamatsupplier;
        $insertuser->statussupplier        = $txtstatussupplier;
        $insertuser->save(); 
    }

    public function gettfpembelian($kodesupplier)
    {
        $data = supplier::select("supplier.*")->where("kodesupplier","=",$kodesupplier)->get();
        return $data;
    }
}
