<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nip' => '2022111801',
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345'),
            'phone' => '081234567890',
            'role' => 'Super Admin',
        ]);

        DB::table('users')->insert([
            'nip' => '2022111802',
            'name' => 'Administrator 1',
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('12345'),
            'phone' => '081234567891',
            'role' => 'Admin',
        ]);

        DB::table('users')->insert([
            'nip' => '2022111803',
            'name' => 'Administrator 2',
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('12345'),
            'phone' => '081234567892',
            'role' => 'Admin',
        ]);

        DB::table('users')->insert([
            'nip' => '2022111804',
            'name' => 'Administrator 3',
            'username' => 'admin3',
            'email' => 'admin3@gmail.com',
            'password' => bcrypt('12345'),
            'phone' => '081234567893',
            'role' => 'Admin',
        ]);
    }
}
