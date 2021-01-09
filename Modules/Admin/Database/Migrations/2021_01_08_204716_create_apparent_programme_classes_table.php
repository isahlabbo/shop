<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApparentProgrammeClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apparent_programme_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('programme_class_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('programme_classes')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('apparent_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('apparents')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('discount')->default(0);
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
        Schema::dropIfExists('apparent_programme_classes');
    }
}
