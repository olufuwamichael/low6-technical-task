<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorseracingHorseRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horseracing_horse_race', function (Blueprint $table) {
            $table->unsignedBigInteger('horse_id');
            $table->unsignedBigInteger('race_id');

            $table->foreign('horse_id')->references('id')->on('horseracing_horses');
            $table->foreign('race_id')->references('id')->on('horseracing_races');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horseracing_horse_race');
    }
}
