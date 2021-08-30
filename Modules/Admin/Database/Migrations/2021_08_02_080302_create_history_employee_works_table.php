<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryEmployeeWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_employee_works', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('department_id')->default(0)->index();
            $table->tinyInteger('employee_id')->default(0)->index();
            $table->tinyInteger('position_id')->default(0)->index();
            $table->mediumText('description')->nullable();
            $table->tinyInteger('status')->default(0)->index();
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
        Schema::dropIfExists('history_employee_works');
    }
}
