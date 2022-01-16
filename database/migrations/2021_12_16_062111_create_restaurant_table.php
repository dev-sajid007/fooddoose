<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant', function (Blueprint $table) {
            $table->bigInteger('restaurant_id', true);
            $table->integer('user_id');
            $table->bigInteger('merchant_id')->nullable();
            $table->string('restaurant_name', 100);
            $table->string('restaurant_code', 100);
            $table->string('address');
            $table->integer('tin');
            $table->string('since', 100)->nullable();
            $table->boolean('status')->nullable()->comment('1 active, 2 not active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant');
    }
}
