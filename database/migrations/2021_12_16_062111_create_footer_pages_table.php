<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_pages', function (Blueprint $table) {
            $table->integer('footer_page_id', true);
            $table->string('title', 200)->nullable();
            $table->string('slug', 200)->nullable();
            $table->string('meta_tags', 200)->nullable();
            $table->string('header', 200)->nullable();
            $table->string('sub_header', 200);
            $table->text('description')->nullable();
            $table->tinyInteger('position')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('footer_pages');
    }
}
