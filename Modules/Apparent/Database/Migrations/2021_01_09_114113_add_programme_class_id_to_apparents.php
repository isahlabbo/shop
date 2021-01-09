<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgrammeClassIdToApparents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apparents', function (Blueprint $table) {
            $table->integer('programme_class_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('programme_classes')
            ->delete('restrict')
            ->update('cascade');
        });
    }

}
