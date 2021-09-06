<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id');
            $table->integer('site_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('subdepartment_id')->unsigned();
            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('subdepartment_id')->references('id')->on('subdepartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
