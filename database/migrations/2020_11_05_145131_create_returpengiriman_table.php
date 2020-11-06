<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturpengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returpengiriman', function (Blueprint $table) {
            $table->string('nomorretur',11);
            $table->string('kodebarang',4);
            $table->date('tglretur');
            $table->integer('jumlahbarang');
            $table->string('keterangan');
            $table->string('nonotapengirimanB',11);
            $table->primary('nomorretur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returpengiriman');
    }
}
