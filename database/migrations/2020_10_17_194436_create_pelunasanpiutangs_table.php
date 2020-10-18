<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelunasanpiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelunasanpiutang', function (Blueprint $table) {
            $table->string('nonotapelunasan',11);
            $table->string('username');
            $table->string('kodecustomer');
            $table->date('tglpelunasan');
            $table->integer('grandtotal');
            $table->integer('jumlahdibayar');
            $table->string('nonotapenjualanBJ',11);
            $table->primary('nonotapelunasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelunasanpiutang');
    }
}
