<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpenjualanbjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpenjualanbj', function (Blueprint $table) {
            $table->string('nonotaDBJ',12);
            $table->string('namabarangDBJ',50);
            $table->string('satuaanDBJ',30);
            $table->integer('hargaDBJ');
            $table->integer('qtyDBJ');
            $table->integer('grandtotalDBJ');
            $table->string('statusDBJ',12);
            $table->string('nonotaBJFK',12);
            $table->primary('nonotaDBJ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailpenjualanbj');
    }
}
