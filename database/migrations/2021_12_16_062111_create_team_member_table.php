<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member', function (Blueprint $table) {
            $table->integer('team_member_id', true);
            $table->string('name', 150)->nullable();
            $table->text('details')->nullable();
            $table->string('position', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('facebook', 200)->nullable();
            $table->string('linkdin', 200)->nullable();
            $table->string('twitter', 200)->nullable();
            $table->string('team_member_image', 200)->nullable()->default('image.jpg');
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
        Schema::dropIfExists('team_member');
    }
}
