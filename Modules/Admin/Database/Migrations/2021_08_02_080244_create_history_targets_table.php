<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_targets', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('department_id')->default(0)->index();
            $table->tinyInteger('employee_id')->default(0)->index();
            $table->tinyInteger('status')->default(0)->index();
            $table->text('result')->nullable();
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
        Schema::dropIfExists('history_targets');
    }
}
