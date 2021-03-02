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
            $table->id();
            $table->string('name')->nullable();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('order_transaction_id');
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->double('amount')->nullable();
            $table->string('address')->nullable();
            $table->integer('quantity');
            $table->string('order_code');
            $table->string('status')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency');
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
