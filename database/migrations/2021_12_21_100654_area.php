<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class Area extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('area', function (Blueprint $table) {
$table->Increments('area_id');
$table->integer('district_id');
$table->string('area_name',150)->nullable();
$table->longText('area_description')->nullable();
$table->string('area_photo',200)->nullable();
$table->string('area_banner_photo',200)->nullable();
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
Schema::dropIfExists('area');
}
}