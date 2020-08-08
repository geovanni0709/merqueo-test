<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * class CreateProviderTable
 */
class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('provider')) {
            Schema::create('provider', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('rut', 20)->unique();
                $table->string('contact_name');
                $table->string('phone', 20);
                $table->string('address_location');
                $table->smallInteger('status')->unsigned()->default(1);
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
        Schema::dropIfExists('provider');
    }
}
