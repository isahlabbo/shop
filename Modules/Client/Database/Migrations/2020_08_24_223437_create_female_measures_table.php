<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFemaleMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('female_measures', function (Blueprint $table) {
            $table->id();
            $table->string('shoulder')->nullable();
            $table->string('half_cut')->nullable();
            $table->string('flip_play')->nullable();
            $table->string('lowse_lenth')->nullable();
            $table->string('bonse')->nullable();
            $table->string('under_bonse')->nullable();
            // gown measurement
            $table->string('full_gown_lenth')->nullable();
            $table->string('half_gown_length')->nullable();
            // sket
            $table->string('waist_width')->nullable();
            $table->string('hip_width')->nullable();
            $table->string('under_hip_width')->nullable();
            $table->string('sket_lenth')->nullable();
            // 
            
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
        Schema::dropIfExists('female_measures');
    }
}
