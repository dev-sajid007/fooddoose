<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_food', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('extra_id')->unsigned();
            $table->timestamps();
            $table->foreign('food_id')
                ->references('id')->on('food')
                ->onDelete('cascade');
            $table->foreign('extra_id')
                ->references('id')->on('extras')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_food');
    }
}
