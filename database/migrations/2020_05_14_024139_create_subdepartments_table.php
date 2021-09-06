<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubdepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdepartments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->string('note');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subdepartments');
    }
}
