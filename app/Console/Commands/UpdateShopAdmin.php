<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Admin\Entities\Admin;

class UpdateShopAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sewmycloth:update-shop-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Admin::all() as $admin) {
            foreach ($admin->shops as $shop) {
                $admin->shopAdmins()->firstOrCreate(['shop_id'=>$shop->id]);
            }
        }
        return count(Admin::all()).' admins updated successfully';
    }
}
