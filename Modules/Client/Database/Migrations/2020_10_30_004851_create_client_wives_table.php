<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientWivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_wives', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('clients')
            ->delete('restrict')
            ->update('cascade');

            $table->integer('wife_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('clients')
            ->delete('restrict')
            ->update('cascade');
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
        Schema::dropIfExists('client_wives');
    }
}
