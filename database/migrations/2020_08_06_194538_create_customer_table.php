<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * class CreateCustomerTable
 */
class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('customer')) {
            Schema::create('customer', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('identification', 30)->unique();
                $table->string('email', 150)->unique();
                $table->string('phone', 20);
                $table->smallInteger('is_active')->unsigned()->default(1);
                $table->timestamps();
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
        Schema::dropIfExists('customer');
    }
}
