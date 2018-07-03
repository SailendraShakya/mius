<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('total_steps')->nullable();
            $table->string('exercise_time')->nullable();
            $table->string('goal_step')->nullable();
            $table->string('distance_walked')->nullable();
            $table->string('total_calories')->nullable();
            $table->string('distance_unit')->nullable();
            $table->string('bmr')->nullable();
            $table->string('distance')->nullable();
            $table->string('date')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('steps');
    }
}
