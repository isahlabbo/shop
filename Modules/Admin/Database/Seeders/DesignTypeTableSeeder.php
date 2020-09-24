<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\DesignType;

class DesignTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = ['Male Only','Female Only', 'Male And Female'];
        
        foreach ($types as $type) {
            DesignType::firstOrCreate(['name'=>$type]);
        }
    }
}
