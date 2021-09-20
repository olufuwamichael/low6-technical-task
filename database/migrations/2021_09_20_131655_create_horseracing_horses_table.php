<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorseracingHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horseracing_horses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bred');
            $table->string('status');
            $table->unsignedBigInteger('cloth_number');
            $table->string('weight_units');
            $table->string('weight_value');
            $table->string('weight_text')->nullable();

            $table->unsignedBigInteger('jockey_id');
            $table->foreign('jockey_id')->references('id')->on('horseracing_jockeys');

            $table->unsignedBigInteger('trainer_id');
            $table->foreign('trainer_id')->references('id')->on('horseracing_trainers');
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
        Schema::dropIfExists('horseracing_horses');
    }
}
