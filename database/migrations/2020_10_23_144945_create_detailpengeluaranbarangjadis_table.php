<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpengeluaranbarangjadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpengeluaranbarangjadi', function (Blueprint $table) {
            $table->string('nonotadpengeluaranB',11);
            $table->string('kodebarang',4);
            $table->integer('jumlahpengeluaranB');
            $table->string('nonotapengeluaranB',11);
            $table->primary('nonotadpengeluaranB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailpengeluaranbarangjadi');
    }
}
