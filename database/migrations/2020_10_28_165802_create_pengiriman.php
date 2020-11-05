<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_detail_pengirimanbarang AFTER INSERT ON detailpengirimanbarang FOR EACH ROW
        BEGIN
            update barang set stok=stok - NEW.jumlahbarang where barang.kodebarang=NEW.kodebarang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_detail_pengirimanbarang`');
    }
}
