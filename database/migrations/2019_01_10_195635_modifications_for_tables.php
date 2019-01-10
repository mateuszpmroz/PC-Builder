<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificationsForTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('graphics_card', function (Blueprint $table) {
            $table->integer('price');
        });
        Schema::table('ram', function (Blueprint $table) {
            $table->integer('price');
        });
        Schema::table('processor', function (Blueprint $table) {
            $table->integer('price');
        });
        Schema::table('power_supply', function (Blueprint $table) {
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('graphics_card', function (Blueprint $table) {
            $table->dropColumn('price');
        });
        Schema::table('ram', function (Blueprint $table) {
            $table->dropColumn('price');
        });
        Schema::table('processor', function (Blueprint $table) {
            $table->dropColumn('price');
        });
        Schema::table('power_supply', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}
