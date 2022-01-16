<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->integer('slider_id', true);
            $table->string('slider_details', 200)->nullable();
            $table->string('slider_link', 200)->nullable();
            $table->string('slider_image', 150)->nullable()->default('slider_image.jpg');
            $table->boolean('slider_status')->default(false)->comment('0 deactive 1 active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider');
    }
}
