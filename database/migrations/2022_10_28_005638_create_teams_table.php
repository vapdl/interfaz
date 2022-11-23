<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('categories_has_academies_categories_id');
            $table->unsignedBigInteger('categories_has_academies_academies_id');

            $table->index(['categories_has_academies_categories_id', 'categories_has_academies_academies_id'], 'fk_teams_categories_has_academies1_idx');
            $table->primary(['id', 'categories_has_academies_categories_id', 'categories_has_academies_academies_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
