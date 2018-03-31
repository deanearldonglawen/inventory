<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('item_name')->nullable();
            $table->string('unit_of_measure');
            $table->integer('opening')->nullable();
            $table->integer('closing')->nullable();
            $table->integer('sale')->nullable();
            $table->date('order_period')->nullable();
            $table->integer('safety_stock')->nullable();
            $table->string('remarks')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
