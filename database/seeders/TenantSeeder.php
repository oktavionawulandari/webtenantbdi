<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenants')->insert([
            'username' => 'tenanta',
            'password' => bcrypt('12345'),
            'role' => 'Tenant',
        ]);

        DB::table('tenants')->insert([
            'username' => 'tenantb',
            'password' => bcrypt('12345'),
            'role' => 'Tenant',
        ]);

        DB::table('tenants')->insert([
            'username' => 'tenantc',
            'password' => bcrypt('12345'),
            'role' => 'Tenant',
        ]);
    }
}
