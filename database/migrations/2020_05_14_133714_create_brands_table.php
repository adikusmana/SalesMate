<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('subdepartment_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->Integer('vendor_id')->unsigned();
            $table->string('note');
            $table->timestamps();

            $table->foreign('subdepartment_id')->references('id')->on('subdepartments');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
