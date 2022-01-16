<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->bigIncrements('merchant_id');
            $table->bigInteger('user_id')->nullable();
            $table->boolean('marchant_status')->default(false)->comment('1 approved, 0 pending, 2 banned');
            $table->string('business_name', 100)->nullable();
            $table->string('bkash_number')->nullable();
            $table->string('rocket_number')->nullable();
            $table->string('nagad_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('merchant');
    }
}
