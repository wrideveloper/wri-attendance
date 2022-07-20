<?php

namespace Database\Seeders;

use App\Models\Meetings;
use Illuminate\Database\Seeder;

class MeetingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Meetings::factory(20)->create();
    }
}
