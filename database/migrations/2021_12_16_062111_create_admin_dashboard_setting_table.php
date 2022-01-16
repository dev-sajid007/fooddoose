<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminDashboardSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_dashboard_setting', function (Blueprint $table) {
            $table->integer('admin_dashboard_id')->default(1);
            $table->string('title', 100)->nullable();
            $table->string('dashboard_name', 100)->nullable();
            $table->string('short_char_title', 100)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('footer_greeting', 100)->nullable();
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
        Schema::dropIfExists('admin_dashboard_setting');
    }
}
