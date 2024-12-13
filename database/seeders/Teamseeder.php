<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{


    public function run()
    {
        DB::table('teams')->insert([
            ['creator_id' => 1, 'name' => 'FC Barcelona', 'points' => 75],
            ['creator_id' => 2, 'name' => 'Real Madrid', 'points' => 80],
            ['creator_id' => 3, 'name' => 'Juventus', 'points' => 70],
            ['creator_id' => 4, 'name' => 'Bayern München', 'points' => 85],
            ['creator_id' => 5, 'name' => 'Paris Saint-Germain', 'points' => 90],
        ]);
    }
}
