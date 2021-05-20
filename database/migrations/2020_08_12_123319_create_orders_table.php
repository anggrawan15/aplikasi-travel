<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice')->unique();
            $table->string('customer_nama');
            $table->string('customer_email');
            $table->string('customer_alamat');
            $table->string('customer_notlp');

            $table->date('tgl_datang');
            $table->string('status');
            
            $table->integer('jumlah');
            $table->integer('total');
            
            $table->unsignedBIgInteger('paket_id');
            $table->string('customer_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
