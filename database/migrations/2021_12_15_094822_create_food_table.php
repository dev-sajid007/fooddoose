<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('restaurant_id')->unsigned();
            $table->string('name');
            $table->string('food_code');
            $table->string('quantity');
            $table->double('price');
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->enum('discount_type', ['fixed', 'percentage'])->nullable();
            $table->string('discount_price')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->foreign('restaurant_id')
                ->references('id')->on('restaurants')
                ->onDelete('cascade');
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
        Schema::dropIfExists('food');
    }
}
