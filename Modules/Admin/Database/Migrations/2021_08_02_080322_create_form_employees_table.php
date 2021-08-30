<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_employees', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('department_id')->nullable(0)->index();
            $table->tinyInteger('employee_id')->nullable(0)->index();
            $table->string('name');
            $table->mediumText('reason')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->tinyInteger('status')->default(1)->index();
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
        Schema::dropIfExists('form_employees');
    }
}
