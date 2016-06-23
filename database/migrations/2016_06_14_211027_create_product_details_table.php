<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productDetails',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('idProduct')->unsigned();
            $table->integer('idCart')->unsigned();
            $table->integer('quantity');
            $table->foreign('idProduct')->references('id')->on('products');
            $table->foreign('idCart')->references('id')->on('carts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productDetails');
    }
}
