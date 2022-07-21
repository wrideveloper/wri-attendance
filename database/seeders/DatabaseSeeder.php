<?php

namespace Database\Seeders;

use App\Models\Miniclass;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            MiniclassSeeder::class,
            GenerationSeeder::class,
            // UserSeeder::class,
            MeetingsSeeder::class,
            PresenceSeeder::class,
        ]);
    }
}
