<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoribarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoribarang', function (Blueprint $table) {
            $table->string('kodekategoribarang',5);
            $table->string('namakategoribarang',50);
            $table->string('statuskategoribarang',13);
            $table->primary('kodekategoribarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoribarang');
    }
}
