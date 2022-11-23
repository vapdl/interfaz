<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesHasTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches_has_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('coaches_id');
            $table->unsignedBigInteger('coaches_users_id');
            $table->unsignedBigInteger('coaches_academies_id');
            $table->unsignedBigInteger('teams_id')->index('fk_coaches_has_teams_teams1_idx');

            $table->index(['coaches_id', 'coaches_users_id', 'coaches_academies_id'], 'fk_coaches_has_teams_coaches1_idx');
            $table->primary(['coaches_id', 'coaches_users_id', 'coaches_academies_id', 'teams_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches_has_teams');
    }
}
