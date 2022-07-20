<?php

namespace Database\Seeders;

use App\Models\Miniclass;
use Illuminate\Database\Seeder;

class MiniclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
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
