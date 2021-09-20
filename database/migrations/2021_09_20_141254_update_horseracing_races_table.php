<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorseracingRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horseracing_races', function (Blueprint $table) {
            $table->unsignedBigInteger('meeting_id');
            $table->foreign('meeting_id')->references('id')->on('horseracing_meetings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horseracing_races', function (Blueprint $table) {
            $table->dropColumn('meeting_id');
            $table->dropConstrainedForeignId('meeting_id')->references('id')->on('horseracing_meetings');
        });
    }
}
