<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('vendor_id')->unsigned();
            $table->Integer('site_id')->unsigned();
            $table->Integer('user_id')->unsigned();
            $table->Integer('department_id')->unsigned();
            $table->Integer('subdepartment_id')->unsigned();
            $table->Integer('brand_id')->unsigned();
            $table->date('transdate');
            $table->time('transtime');
            $table->string('transid');
            $table->string('plu', 20);
            $table->integer('price');
            $table->integer('qty');
            $table->integer('amount');
            $table->integer('margin');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('site_id')->references('id')->on('sites');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('subdepartment_id')->references('id')->on('subdepartments');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
