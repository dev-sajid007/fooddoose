<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateScheduleTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('schedule', function (Blueprint $table) {
$table->bigInteger('schedule_id', true)->comment('1 open, 2 close');
$table->integer('restaurant_id');
$table->integer('user_id');
$table->string('sunday', 100)->nullable()->comment('1 active, 2 inactive');
$table->string('monday', 100)->nullable()->comment('1 active, 2 inactive');
$table->string('tuesday', 100)->nullable()->comment('1 active, 2 inactive');
$table->string('wednesday', 100)->nullable()->comment('1 active, 2 inactive');
$table->string('thursday', 100)->nullable()->comment('1 active, 2 inactive');
$table->string('friday', 100)->nullable()->comment('1 active, 2 inactive');
$table->string('saturday', 100)->nullable()->comment('1 active, 2 inactive');
$table->time('shop_open')->nullable();
$table->time('shop_close')->nullable();
$table->timestamp('created_at')->nullable()->useCurrent();
$table->timestamp('updated_at')->useCurrent();
$table->softDeletes();
});
}
/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists('schedule');
}
}