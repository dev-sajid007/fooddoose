<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('salary_type')->nullable();
            $table->string('pay_system')->nullable();
            $table->string('pay_method')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->date('pay_date')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status')->comment('1 = Paid, 0= Unpaid');
            $table->softDeletes();
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
        Schema::dropIfExists('salaries');
    }
}
