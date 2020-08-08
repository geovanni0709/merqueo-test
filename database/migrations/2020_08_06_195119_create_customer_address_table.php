<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * class CreateCustomerAddressTable
 */
class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('customer_address')) {
            Schema::create('customer_address', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('customer_id')->unsigned();
                $table->string('address_name');
                $table->integer('country_id');
                $table->integer('depto_id');
                $table->integer('city_id');
                $table->string('street');
                $table->string('postcode', 20)->nullable($value = true);
                $table->string('additional_info')->nullable($value = true);
                $table->string('phone', 20)->nullable($value = true);
                $table->smallInteger('is_active')->unsigned()->default(1);
                $table->timestamps();
                $table->foreign('customer_id')->references('id')->on('customer');
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
        Schema::dropIfExists('customer_address');
    }
}
