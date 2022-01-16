<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('restaurant_code')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->string('address')->nullable();
            $table->string('contact_no');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('url_link')->nullable();
            $table->string('tin')->nullable();
            $table->dateTime('since')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('restaurants');
    }
}
