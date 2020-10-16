<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyesuaianstoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyesuaianstok', function (Blueprint $table) {
            $table->string('nonotaPS',50);
            $table->string('kodebarang',50);
            $table->integer('stokNow');
            $table->integer('stokRevisi');
            $table->String('keterangan',100);
            $table->primary('nonotaPS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyesuaianstok');
    }
}
