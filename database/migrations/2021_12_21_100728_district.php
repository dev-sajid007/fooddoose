<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class District extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('district', function (Blueprint $table) {
$table->Increments('district_id');
$table->string('district_name',150)->nullable();
$table->longText('district_details')->nullable();
$table->string('distric_status',50)->nullable();
$table->string('district_photo',200)->nullable();
$table->string('district_banner_photo',200)->nullable();
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
Schema::dropIfExists('district');
}
}