<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Schedule;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = ['Morning', 'Evening'];
        foreach ($schedules as $key => $value) {
           Schedule::firstOrCreate(['name'=>$value]);
        }
    }
}
