<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaleMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('male_measures', function (Blueprint $table) {
            $table->id();
            $table->string('shoulder')->nullable();
            $table->string('trouser_length')->nullable();
            $table->string('full_shirt_lenth')->nullable();
            $table->string('half_shirt_lenth')->nullable();
            $table->string('full_hand_lenth')->nullable();
            $table->string('half_hand_lenth')->nullable();
            $table->string('bonse')->nullable();
            $table->string('under_bonse')->nullable();
            $table->string('neck_width')->nullable();
            $table->string('hand_width')->nullable();
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
        Schema::dropIfExists('male_measures');
    }
}
