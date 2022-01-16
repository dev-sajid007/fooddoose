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
            $table->bigInteger('user_id')->unsigned();
            $table->string('order_No');
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('transaction_no')->nullable();
            $table->double('subtotal');
            $table->double('total');
            $table->enum('delivery_type', ['take_out', 'home_delivery'])->nullable();
            $table->string('delivery_address')->nullable();
            $table->double('delivery_charge')->nullable();
            $table->string('status')->nullable();
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
