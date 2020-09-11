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
        Model::unguard();

        $types = ['Male Only','Female Only', 'Male and Fema'];
        
        foreach ($types as $type) {
            DesignType::create(['name'=>$type]);
        }
    }
}
