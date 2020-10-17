<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->string('kodecustomer',4);
            $table->string('namatoko',50);
            $table->string('contactperson',50);
            $table->string('alamat',150);
            $table->string('kota',50);
            $table->string('ktp',16);
            $table->string('hp',13);
            $table->string('status',12);
            $table->string('tipepembayaran',7);
            $table->primary('kodecustomer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
