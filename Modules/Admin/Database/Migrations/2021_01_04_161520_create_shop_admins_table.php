<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_admins', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shops')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('admin_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('admins')
            ->delete('restrict')
            ->update('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('shop_admins');
    }
}
