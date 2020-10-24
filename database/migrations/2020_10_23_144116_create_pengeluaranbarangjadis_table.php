<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaranbarangjadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaranbarangjadi', function (Blueprint $table) {
            $table->string('nonotapengeluaranB',11);
            $table->date('tglpengeluaranB');
            $table->string('username');
            $table->string('keteranganpengeluaranB');
            $table->primary('nonotapengeluaranB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaranbarangjadi');
    }
}
