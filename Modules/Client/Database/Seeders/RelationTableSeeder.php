<?php

namespace Modules\Client\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Client\Entities\Relation;

class RelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = ['Father','Mother','Husband', 'Wife', 'Child','House Work'];

        foreach ($relations as $key => $value) {
            Relation::firstOrCreate(['name'=>$value]);
        }
    }
}
