<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesHasTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes_has_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('athletes_id');
            $table->unsignedBigInteger('athletes_users_id');
            $table->unsignedBigInteger('athletes_academies_id');
            $table->unsignedBigInteger('teams_id')->index('fk_athletes_has_teams_teams1_idx');

            $table->index(['athletes_id', 'athletes_users_id', 'athletes_academies_id'], 'fk_athletes_has_teams_athletes1_idx');
            $table->primary(['athletes_id', 'athletes_users_id', 'athletes_academies_id', 'teams_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athletes_has_teams');
    }
}
