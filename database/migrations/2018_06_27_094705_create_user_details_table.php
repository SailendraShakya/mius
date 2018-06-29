<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable();
            $table->string('age')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('goals')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('battery')->nullable();
            $table->string('fcm')->nullable();
            $table->string('sos_status')->nullable();
            $table->string('location_time')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('activation_date')->nullable();
            $table->string('livetrack')->nullable();
            $table->string('livetrack_time')->nullable();
            $table->string('is_active')->nullable();
            $table->string('code_updated_at')->nullable();
            $table->integer('beepinit')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('user_details');
    }
}
