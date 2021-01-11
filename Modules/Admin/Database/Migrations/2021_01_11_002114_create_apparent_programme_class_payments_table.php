<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApparentProgrammeClassPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apparent_programme_class_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('apparent_programme_class_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('apparent_programme_classes')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('amount');
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
        Schema::dropIfExists('apparent_programme_class_payments');
    }
}
