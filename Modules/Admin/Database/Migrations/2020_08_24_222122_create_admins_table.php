<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
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
        Schema::dropIfExists('admins');
    }
}
