<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historyharga extends Model
{
    public $table       = 'historyharga';
    public $primaryKey  = 'idhistory';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtidhistoryHH, $txtkodebarangHH,$txttanggalhistoryHH,$txttanggalberlakuHH,$txthargajualHH)
    {
        $counter                = historyharga::all()->count() + 1; 
        if($counter < 10)       { $txtidhistory = "HH00".$counter; }
        else if($counter < 100) { $txtidhistory = "HH0".$counter; }
        else                    { $txtidhistory = "H".$counter;  }

        $insertuser                             = new historyharga(); 
        $insertuser->idhistory                  = $txtidhistoryHH; 
        $insertuser->kodebarang                 = $txtkodebarangHH; 
        $insertuser->tanggalhistory             = $txttanggalhistoryHH;
        $insertuser->tanggalberlaku             = $txttanggalberlakuHH;
        $insertuser->hargajual                  = $txthargajualHH;
        $insertuser->save(); 
    }

    
    public function getbaranghistory($kodebarang)
    {
        $data = historyharga::select("historyharga.*")->where("kodebarang","=",$kodebarang)->get();
        return $data;
    }
}
