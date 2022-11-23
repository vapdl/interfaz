<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAthletesHasTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('athletes_has_teams', function (Blueprint $table) {
            $table->foreign(['athletes_id', 'athletes_users_id', 'athletes_academies_id'], 'fk_athletes_has_teams_athletes1')->references(['id', 'users_id', 'academies_id'])->on('athletes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['teams_id'], 'fk_athletes_has_teams_teams1')->references(['id'])->on('teams')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('athletes_has_teams', function (Blueprint $table) {
            $table->dropForeign('fk_athletes_has_teams_athletes1');
            $table->dropForeign('fk_athletes_has_teams_teams1');
        });
    }
}
