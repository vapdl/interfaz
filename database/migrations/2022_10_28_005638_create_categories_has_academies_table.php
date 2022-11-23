<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesHasAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_has_academies', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_id')->index('fk_categories_has_academies_categories1_idx');
            $table->unsignedBigInteger('academies_id')->index('fk_categories_has_academies_academies1_idx');

            $table->primary(['categories_id', 'academies_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_has_academies');
    }
}
