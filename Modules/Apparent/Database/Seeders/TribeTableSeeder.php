<?php

namespace Modules\Apparent\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Apparent\Entities\Tribe;

class TribeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tribes = ['Hausa', 'Fulani', 'Yoruba', 'Igbo', 'Chlela','Other'];
        foreach ($tribes as $key => $value) {
            Tribe::firstOrCreate(['name'=>$value]);
        }
    }
}
