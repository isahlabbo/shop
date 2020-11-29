<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientShopSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_shop_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('clients')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('shop_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shops')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('client_shop_subscriptions');
    }
}
