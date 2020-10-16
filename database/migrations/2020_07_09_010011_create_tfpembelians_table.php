<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTfpembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tfpembelian', function (Blueprint $table) {
            $table->string('nonotaTFPembelian',11);
            $table->string('kodesupplier',4);
            $table->date('tglpembelianTF');
            $table->string('statusTF',12);
            $table->string('jenispembayaranTF',7);
            $table->primary('nonotaTFPembelian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tfpembelian');
    }
}
