<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->default(0)->index();
            $table->integer('position_id')->default(0)->index();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->integer('sex')->nullable();
            $table->string('address');
            $table->integer('identity_card')->unique();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('avatar')->nullable();
            $table->date('date_join')->nullable();
            $table->date('date_entry')->nullable();
            $table->date('date_end')->nullable();
            $table->date('date_out')->nullable();
            $table->integer('exp_year')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
