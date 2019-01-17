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
            $table->foreign('ram_id')->references('id')->on('rams');
            $table->foreign('processor_id')->references('id')->on('processors');
            $table->foreign('power_supply_id')->references('id')->on('power_supplies');
            $table->foreign('graphic_id')->references('id')->on('graphics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setup', function (Blueprint $table) {
            $table->dropForeign('setups_user_id_foreign');
            $table->dropForeign('setups_ram_id_foreign');
            $table->dropForeign('setups_processor_id_foreign');
            $table->dropForeign('setups_graphic_id_foreign');
            $table->dropForeign('setups_power_supply_id_foreign');
        });
        Schema::dropIfExists('setups');
    }
}
