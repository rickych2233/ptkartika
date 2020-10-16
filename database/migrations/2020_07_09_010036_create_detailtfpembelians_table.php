<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailtfpembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtfpembelian', function (Blueprint $table) {
            $table->integer('nonotaDTFPembelian');
            $table->string('barangbakuDTFPembelian',5);
            $table->integer('qtyDTFPembelian');
            $table->integer('hargaDTFPembelian');
            $table->integer('grandtotalDTF');
            $table->string('nonotaTFPembelian',11);
            $table->primary('nonotaDTFPembelian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailtfpembelian');
    }
}
