<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_prizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item');
            $table->string('gift');
            $table->string('code');
            $table->string('quantity');
            $table->string('total_week_in_month');
            $table->string('total_quantity_in_month');
            $table->string('probability');
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
        Schema::dropIfExists('main_prizes');
    }
}
