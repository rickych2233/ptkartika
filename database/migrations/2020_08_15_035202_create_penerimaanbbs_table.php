<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanbbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaanbb', function (Blueprint $table) {
            $table->string('nonotapenerimaanBB',13);
            $table->string('kodesupplier',4);
            $table->string('tglpenerimaanBB');
            $table->string('statuspenerimaanBB',12);
            $table->string('jenispembayaranBB',7);
            $table->primary('nonotapenerimaanBB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaanbb');
    }
}
