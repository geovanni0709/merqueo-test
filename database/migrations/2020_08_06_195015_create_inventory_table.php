<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * class CreateInventoryTable
 */
class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('inventory')) {
            Schema::create('inventory', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('warehouse_id');
                $table->decimal('qty', 8, 2);
                $table->dateTime('inventory_date');
                $table->integer('product_id')->unsigned();
                $table->timestamps();
                $table->index('warehouse_id');
                $table->index('inventory_date');
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
        Schema::dropIfExists('inventory');
    }
}
