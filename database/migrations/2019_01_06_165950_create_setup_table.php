<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('user_id');
            $table->UnsignedInteger('ram_id');
            $table->UnsignedInteger('processor_id');
            $table->UnsignedInteger('power_supply_id');
            $table->UnsignedInteger('graphics_card_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('ram_id')->references('id')->on('ram');
            $table->foreign('processor_id')->references('id')->on('processor');
            $table->foreign('power_supply_id')->references('id')->on('power_supply');
            $table->foreign('graphics_card_id')->references('id')->on('graphics_card');
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
            $table->dropForeign('setup_user_id_foreign');
            $table->dropForeign('setup_ram_id_foreign');
            $table->dropForeign('setup_processor_id_foreign');
            $table->dropForeign('setup_graphics_card_id_foreign');
            $table->dropForeign('setup_power_supply_id_foreign');
        });
        Schema::dropIfExists('setup');
    }
}
