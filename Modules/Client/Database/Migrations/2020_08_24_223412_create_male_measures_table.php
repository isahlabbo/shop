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
            $table->integer('client_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('clients')
            ->delete('restrict')
            ->update('cascade');
            $table->string('shoulder')->nullable();
            $table->string('trouser_length')->nullable();
            $table->string('waist')->nullable();
            $table->string('under_waist')->nullable();
            $table->string('full_shirt_length')->nullable();
            $table->string('half_shirt_length')->nullable();
            $table->string('full_hand_length')->nullable();
            $table->string('half_hand_length')->nullable();
            $table->string('chest')->nullable();
            $table->string('under_chest')->nullable();
            $table->string('neck')->nullable();
            $table->string('hand_width')->nullable();
            $table->string('clip_width')->nullable();
            $table->string('arm_width')->nullable();
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
