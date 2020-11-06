<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerDbb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_detail_penerimaanbb AFTER INSERT ON detailpenerimaanbb FOR EACH ROW
        BEGIN
<<<<<<< HEAD
            update barang set stok=stok+NEW.qtypenerimaanBB where barang.kodebarang=NEW.kodebarang;
=======
            update barang set stok=stok+NEW.qtypenerimaanBB where barang.kodebarang=NEW.namabarangDPBB;
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_detail_penerimaanbb`');
    }
}
