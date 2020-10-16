<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailprosesproduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailprosesproduksi', function (Blueprint $table) {
            $table->integer('nonotaDPP');
            $table->string('kodebarang',5);
            $table->integer('qtyDPP');
            $table->integer('hargaDPP');
            $table->string('nonotaPP',11);
            $table->primary('nonotaDPP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailprosesproduksi');
    }
}
