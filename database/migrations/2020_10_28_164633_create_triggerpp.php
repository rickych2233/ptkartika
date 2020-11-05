<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_proses_produksi AFTER INSERT ON prosesproduksi FOR EACH ROW
        BEGIN
            update barang set stok=stok+NEW.qtyhasilPP where barang.kodebarang=NEW.kodebarang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_proses_produksi`');
    }
}
