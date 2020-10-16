<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('kodebarang',4);
            $table->string('namabarang',100);
            $table->string('kodekategoribarang',5);
            $table->string('satuan',30);
            $table->integer('stok');
            $table->integer('harga');
            $table->string('status',12);
            $table->primary('kodebarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
