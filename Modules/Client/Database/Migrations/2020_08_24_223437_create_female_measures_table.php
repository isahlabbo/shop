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
            $table->integer('client_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('clients')
            ->delete('restrict')
            ->update('cascade');
            $table->string('shoulder')->nullable();
            $table->string('half_cut')->nullable();
            $table->string('flip_play')->nullable();
            $table->string('blouse_length')->nullable();
            $table->string('bonse')->nullable();
            $table->string('under_bonse')->nullable();
            // hand measurement
            $table->string('full_hand_length')->nullable();
            $table->string('half_hand_length')->nullable();
            $table->string('hand_width')->nullable();
            // gown measurement
            $table->string('full_gown_length')->nullable();
            $table->string('half_gown_length')->nullable();
            // sket
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('under_hip')->nullable();
            $table->string('sket_length')->nullable();
            
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
