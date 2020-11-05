<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigerstok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_penyesuaian_stok AFTER INSERT ON penyesuaianstok FOR EACH ROW
        BEGIN
            update barang set stok=NEW.stokRevisi where barang.kodebarang=NEW.kodebarang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_penyesuaian_stok`');
    }
}
