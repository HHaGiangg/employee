<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->index();
            $table->integer('position_id')->default(0)->index();
            $table->integer('target_department_id')->default(0)->index();
            $table->string('name')->nullable();
            $table->integer('point')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('target_employees');
    }
}
