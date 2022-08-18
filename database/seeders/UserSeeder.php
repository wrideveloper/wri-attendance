<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = [
            [
                'miniclass_id' => 1,
                'roles_id' => 3,
                'generations_id' => 2,
                'name' => 'Ilham Sinatrio Gumelar',
                'email' => 'sgumelar20@gmail.com',
                'phone' => '081234567890',
                'nim' => '2031710031',
                'email_verified_at' => now(),
                'password' => Hash::make('2031710031'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'miniclass_id' => 1,
                'roles_id' => 1,
                'generations_id' => 2,
                'name' => 'User Admin',
                'email' => 'admin@gmail.com',
                'phone' => '081234567890',
                'nim' => '1234567890',
                'email_verified_at' => now(),
                'password' => Hash::make('hesoyam'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'miniclass_id' => 1,
                'roles_id' => 2,
                'generations_id' => 2,
                'name' => 'Kadiv Web',
                'email' => 'kadivWeb@gmail.com',
                'phone' => '081234567890',
                'nim' => '2022080411',
                'email_verified_at' => now(),
                'password' => Hash::make('aezagmi'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'miniclass_id' => 2,
                'roles_id' => 2,
                'generations_id' => 2,
                'name' => 'Kadiv Mobile',
                'email' => 'kadivMobile@gmail.com',
                'phone' => '081234567891',
                'nim' => '0987654321',
                'email_verified_at' => now(),
                'password' => Hash::make('abogoboga'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'miniclass_id' => 3,
                'roles_id' => 2,
                'generations_id' => 2,
                'name' => 'Kadiv UI/UX',
                'email' => 'kadivUIUX@gmail.com',
                'phone' => '081234567892',
                'nim' => '1945081711',
                'email_verified_at' => now(),
                'password' => Hash::make('makotohasebe'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'miniclass_id' => 4,
                'roles_id' => 2,
                'generations_id' => 2,
                'name' => 'Kadiv Game',
                'email' => 'kadivGame@gmail.com',
                'phone' => '081234567893',
                'nim' => '2001091111',
                'email_verified_at' => now(),
                'password' => Hash::make('takitachibana'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('users')->insert($user);
        //User::factory(70)->create();
    }
}
