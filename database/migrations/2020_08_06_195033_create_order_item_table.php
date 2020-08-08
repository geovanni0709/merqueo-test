<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * class CreateOrderItemTable
 */
class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('order_item')) {
            Schema::create('order_item', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('order_id')->unsigned();
                $table->integer('product_id')->unsigned();
                $table->string('product_name');
                $table->integer('qty');
                $table->timestamps();
                $table->foreign('order_id')->references('id')->on('order');
                $table->foreign('product_id')->references('id')->on('product');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
