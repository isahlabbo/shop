<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFamilyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_family_members', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('clients')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('relation_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('relations')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('family_member_id')
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
        Schema::dropIfExists('client_family_members');
    }
}
