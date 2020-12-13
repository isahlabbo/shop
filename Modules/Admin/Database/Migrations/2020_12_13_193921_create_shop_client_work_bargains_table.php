<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopClientWorkBargainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_client_work_bargains', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_client_work_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shop_client_works')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('admin_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('admins')
            ->delete('restrict')
            ->update('cascade');
            $table->text('comment');
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
        Schema::dropIfExists('shop_client_work_bargains');
    }
}
