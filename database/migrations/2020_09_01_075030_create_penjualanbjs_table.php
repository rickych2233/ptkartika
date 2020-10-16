<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanbjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualanbj', function (Blueprint $table) {
            $table->string('nonotapenjualanBJ',11);
            $table->string('kodecustomer',4);
            $table->date('tglpembelianBJ');
            $table->string('statusBJ',12);
            $table->string('jenispembayaranBJ',7);
            $table->string('statuspesanBJ',12);
            $table->primary('nonotapenjualanBJ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualanbj');
    }
}
