<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * class CreateOrderTable
 */
class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('order')) {
            Schema::create('order', function (Blueprint $table) {
                $table->increments('id');
                $table->smallInteger('priority')->unsigned();
                $table->integer('customer_id')->unsigned();
                $table->integer('customer_address_id')->unsigned();
                $table->dateTime('delivery_date');
                $table->string('status');
                $table->smallInteger('is_active')->unsigned()->default(1);
                $table->timestamps();
                $table->index('priority');
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
        Schema::dropIfExists('order');
    }
}
