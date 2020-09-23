<?php

namespace Modules\Apparent\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Apparent\Entities\Religion;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions = ['Islam', 'Christianity', 'Other'];
        foreach ($religions as $key => $value) {
            Religion::firstOrCreate(['name'=>$value]);
        }
    }
}
