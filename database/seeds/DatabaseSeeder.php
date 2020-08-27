<?php

use Illuminate\Database\Seeder;
use Modules\Apparent\Database\Seeders\ApparentDatabaseSeeder;
use Modules\Client\Database\Seeders\ClientDatabaseSeeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ApparentDatabaseSeeder::class);
        $this->call(AdminDatabaseSeeder::class);
        $this->call(ClientDatabaseSeeder::class);
        
    }
}
