<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_designs', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shops')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('apparent_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('apparents')
            ->delete('restrict')
            ->update('cascade');
            $table->text('design_image');
            $table->text('prove_image')->nullable();
            $table->text('comment')->nullable();
            $table->integer('fee')->nullable();
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
        Schema::dropIfExists('shop_designs');
    }
}
