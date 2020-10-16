<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategoribarang extends Model
{
    public $table       = 'kategoribarang';
    public $primaryKey  = 'kodekategoribarang';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtkodekategoribarang, $txtnamakategoribarang,$txtstatuskategoribarang)
    {
        $counter     = kategoribarang::all()->count() + 1; 
        if($counter < 10)       { $txtkodekategoribarang = "KB00".$counter; }
        else if($counter < 100) { $txtkodekategoribarang = "KB0".$counter; }
        else                    { $txtkodekategoribarang = "KB".$counter;  }
    
        $insertuser                          = new kategoribarang(); 
        $insertuser->kodekategoribarang      = $txtkodekategoribarang; 
        $insertuser->namakategoribarang      = $txtnamakategoribarang;
        $insertuser->statuskategoribarang    = $txtstatuskategoribarang; 
        $insertuser->save(); 
    }
}
