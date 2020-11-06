<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpenerimaanbbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpenerimaanbb', function (Blueprint $table) {
            $table->string('nonotaDPBB',12);
            $table->string('kodebarang',50);
            $table->string('satuaanDPBB',30);
            $table->integer('hargaDPBB');
            $table->integer('qtypenerimaanBB');
            $table->integer('qtypemesananBB');
            $table->string('nonotapenerimaanBB',13);
            $table->primary('nonotaDPBB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailpenerimaanbb');
    }
}
