<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryhargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historyharga', function (Blueprint $table) {
            $table->string('idhistory');
            $table->string('kodebarang',4);
            $table->date('tanggalhistory');
            $table->date('tanggalberlaku');
            $table->integer('hargajual');
            $table->primary('idhistory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historyharga');
    }
}
