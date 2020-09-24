<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image')->nullable();
            $table->string('work_capacity');
            $table->text('words')->nullable();
            $table->text('about')->nullable();
            $table->integer('address_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('addresses')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('admin_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('admins')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('design_type_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('design_types')
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
        Schema::dropIfExists('shops');
    }
}
