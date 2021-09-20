<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorseracingMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horseracing_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('status');
            $table->date('date');
            $table->string('course');
            $table->string('revision');
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
        Schema::dropIfExists('horseracing_meeting');
    }
}
