<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('inn')->unique();
            $table->string('last_name');
            $table->string('name');
            $table->string('patronymic');
            $table->string('passport')->unique();
            $table->string('address');
            $table->string('specialty');
            $table->string('phone');
            $table->date('birth_date');
            $table->date('employment_date');
            $table->date('dismissal_date');
            $table->string('description');
            $table->string('email')->unique();
            $table->integer('specialty_id')->unsigned();
            $table->foreign('specialty_id')->references('id')->on('specialtys');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('personnels');
    }
}
