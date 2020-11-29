<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAcreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_acreditations', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shops')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('machines')->nullable();
            $table->integer('designers')->nullable();
            $table->integer('industrials')->nullable();
            $table->integer('zig_zag')->nullable();
            $table->string('shop_size')->nullable();
            $table->integer('shop_identification')->nullable();
            $table->integer('apparents')->nullable();
            $table->integer('dressing_room')->nullable();
            $table->integer('tables')->nullable();
            $table->integer('chairs')->nullable();
            $table->integer('working_materials')->nullable();
            $table->integer('power_suply')->nullable();
            $table->integer('electric_connectivity')->nullable();
            $table->integer('cleanlyness')->nullable();
            $table->integer('condusive')->nullable();
            $table->integer('reception_bench')->nullable();
            $table->integer('addressing_people')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('shop_acreditations');
    }
}
