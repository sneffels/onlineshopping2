<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->integer('productId')->unsigned();
            $table->integer('quantity');
            $table->integer('creditCardId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('creditCardId')->references('id')->on('creditCards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
