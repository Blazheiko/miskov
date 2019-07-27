<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_personnels', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('working_shifts_id')->unsigned();
            $table->foreign('working_shifts_id')->references('id')->on('working_shifts');
            $table->integer('specialties_id')->unsigned();
            $table->foreign('specialties_id')->references('id')->on('specialties');
            $table->integer('work_time');
            $table->boolean('processed');
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
        Schema::dropIfExists('list_personnels');
    }
}
