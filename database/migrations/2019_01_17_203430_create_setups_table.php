<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setups', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('user_id');
            $table->UnsignedInteger('ram_id');
            $table->UnsignedInteger('processor_id');
            $table->UnsignedInteger('power_supply_id');
            $table->UnsignedInteger('graphic_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ram_id')->references('id')->on('components');
            $table->foreign('processor_id')->references('id')->on('components');
            $table->foreign('power_supply_id')->references('id')->on('components');
            $table->foreign('graphic_id')->references('id')->on('components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setups');
    }
}
