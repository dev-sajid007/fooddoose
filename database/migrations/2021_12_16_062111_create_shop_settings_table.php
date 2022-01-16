<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_settings', function (Blueprint $table) {
            $table->bigInteger('ShopID', true);
            $table->string('ShopName', 100);
            $table->text('BannerName')->nullable();
            $table->string('Heading', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('Email_2')->nullable();
            $table->string('Phone', 44)->nullable();
            $table->string('Phone_2', 100)->nullable();
            $table->string('app_link', 191)->nullable();
            $table->text('Address')->nullable();
            $table->text('Website')->nullable();
            $table->text('company_details')->nullable();
            $table->string('Image', 66)->nullable()->default('logo.png');
            $table->string('favicon', 191)->default('favicon.jpg');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_settings');
    }
}
