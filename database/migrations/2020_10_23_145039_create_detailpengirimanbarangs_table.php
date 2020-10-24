<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpengirimanbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpengirimanbarang', function (Blueprint $table) {
            $table->integer('nonotadpengirimanB');
            $table->string('kodebarang',4);
            $table->integer('jumlahbarang');
            $table->string('nonotapengirimanB',11);
            $table->primary('nonotadpengirimanB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailpengirimanbarang');
    }
}
