<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Films extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('films',function (Blueprint $table){
            $table->id();
            $table->string('film_name');
            $table->string('day_of_the_week');
            $table->string('image');
            $table->string('channel');
            $table->bigInteger('episode_number');
        });

    }

    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('films');
    }
}
