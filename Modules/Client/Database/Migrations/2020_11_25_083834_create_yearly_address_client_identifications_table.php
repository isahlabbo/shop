<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearlyAddressClientIdentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearly_address_client_identifications', function (Blueprint $table) {
            $table->id();
            $table->integer('address_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('addresses')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('year')->default(date('Y'));
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
        Schema::dropIfExists('yearly_address_client_identifications');
    }
}
