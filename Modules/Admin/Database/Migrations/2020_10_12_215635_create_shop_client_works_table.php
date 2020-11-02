<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopClientWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_client_works', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_client_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shop_clients')
            ->delete('restrict')
            ->update('cascade');
            $table->text('description')->nullable();
            $table->text('cloth_image')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('fee')->nullable(0);
            $table->integer('paid_fee')->default(0);
            $table->date('finishing_date')->nullable(0);
            $table->time('finishing_time')->nullable(0);
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
        Schema::dropIfExists('shop_client_works');
    }
}
