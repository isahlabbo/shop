<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearlyLgaClientIdentificationIdToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('yearly_lga_client_identification_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('yearly_lga_client_identifications')
            ->delete('restrict')
            ->update('cascade');
        });
    }

}
