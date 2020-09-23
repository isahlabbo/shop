<?php

namespace Modules\Apparent\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ApparentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(TribeTableSeeder::class);
    }
}
