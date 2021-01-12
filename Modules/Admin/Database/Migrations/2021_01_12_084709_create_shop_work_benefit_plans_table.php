<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopWorkBenefitPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_work_benefit_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id')
            ->unsigned()->nullable()
            ->foreign()
            ->references('id')
            ->on('shopes')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('shop_and_its_maintenance')->nullable();
            $table->integer('work_expensive')->nullable();
            $table->integer('work_agent')->nullable();
            $table->integer('work_beneficial')->nullable();
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
        Schema::dropIfExists('shop_work_benefit_plans');
    }
}
