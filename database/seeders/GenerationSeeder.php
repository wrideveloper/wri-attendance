<?php

namespace Database\Seeders;

use App\Models\Generation;
use Illuminate\Database\Seeder;

class GenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Generation::create([
            'crew_name'=>'WRI 7'
        ]);
        Generation::create([
            'crew_name'=>'WRI 8'
        ]);
        Generation::create([
            'crew_name'=>'WRI 9'
        ]);
        Generation::create([
            'crew_name'=>'WRI 10'
        ]);
    }
}
