<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
            [
                'roles_name' => 'Admin',
            ],
            [
                'roles_name' => 'Kadiv',
            ],
            [
                'roles_name' => 'Members'
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
