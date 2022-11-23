<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCoachesHasTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coaches_has_teams', function (Blueprint $table) {
            $table->foreign(['coaches_id', 'coaches_users_id', 'coaches_academies_id'], 'fk_coaches_has_teams_coaches1')->references(['id', 'users_id', 'academies_id'])->on('coaches')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['teams_id'], 'fk_coaches_has_teams_teams1')->references(['id'])->on('teams')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coaches_has_teams', function (Blueprint $table) {
            $table->dropForeign('fk_coaches_has_teams_coaches1');
            $table->dropForeign('fk_coaches_has_teams_teams1');
        });
    }
}
