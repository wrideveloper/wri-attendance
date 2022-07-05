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
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Miniclass::create([
            'miniclass_name' => 'Web'
        ]);

        Miniclass::create([
            'miniclass_name' => 'Mobile'
        ]);

        Miniclass::create([
            'miniclass_name' => 'UI/UX'
        ]);

        Miniclass::create([
            'miniclass_name' => 'Game'
        ]);

        Miniclass::create([
            'miniclass_name' => 'IoT'
        ]);
    }
}
