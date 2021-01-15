<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidToShopClientWorkAdminShares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_client_work_admin_shares', function (Blueprint $table) {
            $table->string('paid')->default(0);
        });
    }

}
