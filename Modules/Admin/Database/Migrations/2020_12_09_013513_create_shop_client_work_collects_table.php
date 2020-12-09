<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopClientWorkCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_client_work_collects', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_client_work_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shop_client_works')
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
        Schema::dropIfExists('shop_client_work_collects');
    }
}
