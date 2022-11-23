<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date_of_birth')->nullable();
            $table->string('blood_type', 25)->nullable();
            $table->string('gender', 1)->default('M');
            $table->string('photo')->nullable();
            $table->string('alias')->default(null);
            $table->timestamps();
            $table->unsignedBigInteger('users_id')->index('fk_athletes_users1_idx');
            $table->unsignedBigInteger('academies_id')->index('fk_athletes_academies1_idx');

            $table->primary(['id', 'users_id', 'academies_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athletes');
    }
}
