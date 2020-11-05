<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerdpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_detail_prosesproduksi AFTER INSERT ON detailprosesproduksi FOR EACH ROW
        BEGIN
            update barang set stok=stok-NEW.qtyDPP where barang.kodebarang=NEW.kodebarang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_detail_prosesproduksi`');
    }
}
