<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerVerifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_verify', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email', 191)->nullable();
            $table->string('address');
            $table->integer('verify_code');
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
        Schema::dropIfExists('customer_verify');
    }
}
