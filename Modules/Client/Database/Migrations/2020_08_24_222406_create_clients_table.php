<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->text('image')->nullable();

            $table->integer('gender_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('genders')
            ->delete('restrict')
            ->update('cascade');

            $table->integer('address_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('addresses')
            ->delete('restrict')
            ->update('cascade');

            $table->integer('yearly_address_client_identification_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('yearly_address_client_identifications')
            ->delete('restrict')
            ->update('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('CIN')->nullable();
            $table->string('referral_code')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
