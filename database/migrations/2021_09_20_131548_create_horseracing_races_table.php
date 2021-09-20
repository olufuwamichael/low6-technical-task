<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorseracingRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horseracing_races', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('time');
            $table->bigInteger('runners');
            $table->boolean('handicap')->default(false);
            $table->boolean('showcase')->default(false);
            $table->boolean('trifecta')->default(false);
            $table->string('stewards');
            $table->string('status');
            $table->integer('revision');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horseracing_race');
    }
}
