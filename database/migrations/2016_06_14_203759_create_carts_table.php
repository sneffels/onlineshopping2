<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('creditCardId')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('totalSave');
            $table->decimal('total');
            $table->string('status');
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
        Schema::drop('carts');
    }
}
