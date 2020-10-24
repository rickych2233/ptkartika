<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengirimanbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimanbarang', function (Blueprint $table) {
            $table->string('nonotapengirimanB',11);
            $table->date('tglpengirimanB');
            $table->string('username');
            $table->string('kodecustomer');
            $table->primary('nonotapengirimanB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengirimanbarang');
    }
}
