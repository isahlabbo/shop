<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAdminCreditSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_admin_credit_shares', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_admin_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shop_admins')
            ->delete('restrict')
            ->update('cascade');
            $table->string('amount');
            $table->string('used')->default(0);
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
        Schema::dropIfExists('shop_admin_credit_shares');
    }
}
