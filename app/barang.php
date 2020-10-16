<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    public $table       = 'barang';
    public $primaryKey  = 'kodebarang';
    public $incrementing= false;
    public $timestamps  =  false;
    public function insertdata($txtkodebarang, $txtnamabarang, $txtkodekategoribarang, $txtsatuanbarang, $txtstokbarang, $txthargabarang, $txtstatusbarang)
    {
        $counter                       = barang::all()->count() + 1;
        $insert                        = new barang(); 
        $insert->kodebarang            = $txtkodebarang; 
        $insert->namabarang            = $txtnamabarang; 
        $insert->kodekategoribarang    = $txtkodekategoribarang; 
        $insert->satuan                = $txtsatuanbarang; 
        $insert->stok                  = $txtstokbarang; 
        $insert->harga                 = $txthargabarang; 
        $insert->status                = $txtstatusbarang; 
        $insert->save(); 
    }

    public function getstatusbarang($restore)
    {
        $data = barang::select("barang.*")->where("status","=",$restore)->get();
        return $data;
    }

    public function getpenyesuaianstok($kodebarang)
    {
        $data = barang::select("barang.*")->where("kodebarang","=",$kodebarang)->get();
        return $data;
    }

    public function getpenambahan($kodebarang)
    {
        $data = barang::select("barang.*")->where("kodebarang","=",$kodebarang)->get();
        return $data;
    } 

    public function select_all()
    {
        $data = barang::select("barang.*","kategoribarang.namakategoribarang")
                        ->join("kategoribarang","kategoribarang.kodekategoribarang", "=", "barang.kodekategoribarang")
                        ->get();
        return $data;
    }
}
