<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCategoriesHasAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories_has_academies', function (Blueprint $table) {
            $table->foreign(['academies_id'], 'fk_categories_has_academies_academies1')->references(['id'])->on('academies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['categories_id'], 'fk_categories_has_academies_categories1')->references(['id'])->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories_has_academies', function (Blueprint $table) {
            $table->dropForeign('fk_categories_has_academies_academies1');
            $table->dropForeign('fk_categories_has_academies_categories1');
        });
    }
}
