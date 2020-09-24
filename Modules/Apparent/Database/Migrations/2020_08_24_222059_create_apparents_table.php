<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apparents', function (Blueprint $table) {
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

            $table->integer('religion_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('religions')
            ->delete('restrict')
            ->update('cascade');
            
            $table->integer('tribe_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('tribes')
            ->delete('restrict')
            ->update('cascade');

            $table->integer('shop_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shops')
            ->delete('restrict')
            ->update('cascade');

            $table->integer('address_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('addresses')
            ->delete('restrict')
            ->update('cascade');

            $table->integer('grantor_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('grantors')
            ->delete('restrict')
            ->update('cascade');

            $table->integer('programme_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('programmes')
            ->delete('restrict')
            ->update('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('apparents');
    }
}
