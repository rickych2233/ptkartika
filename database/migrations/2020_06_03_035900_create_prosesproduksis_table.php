<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsesproduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosesproduksi', function (Blueprint $table) {
            $table->string('nonotaPP',11);
            $table->date('tglPP');
            $table->string('kodebarang',5);
            $table->integer('qtyhasilPP');
            $table->primary('nonotaPP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prosesproduksi');
    }
}
