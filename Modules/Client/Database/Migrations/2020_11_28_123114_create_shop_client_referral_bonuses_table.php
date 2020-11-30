<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopClientReferralBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_client_referral_bonuses', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_client_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shop_clients')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('shop_client_work_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shop_client_works')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('amount')->default(0);
            $table->integer('paid_amount')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('shop_client_referral_bonuses');
    }
}
