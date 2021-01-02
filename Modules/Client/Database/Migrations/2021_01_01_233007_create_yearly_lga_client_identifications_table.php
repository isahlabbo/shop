<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearlyLgaClientIdentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearly_lga_client_identifications', function (Blueprint $table) {
            $table->id();
            $table->integer('lga_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('lgas')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('year')->default(date('Y'));
            $table->integer('counter')->default(0);
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
        Schema::dropIfExists('yearly_lga_client_identifications');
    }
}
