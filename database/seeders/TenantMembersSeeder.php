<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenant_members')->insert([
            'tenant_id' => '1',
            'nik' => '20221120001',
            'full_name' => 'Satrya Mas',
            'short_name' => 'Satrya',
            'position' => 'CEO',
            'birth_place' => 'Denpasar',
            'birth_date' => '2002-09-01',
            'gender' => 'Perempuan',
            'religion' => 'Hindu',
            'status' => 'Belum Menikah',
            'email' => 'satryayayaa@gmail.com',
            'phone' => '081234567890',
            'education' => 'SD/Sederajat',
            'address' => 'Jalan Bima',
            'process' => 'Pending',
        ]);

        DB::table('tenant_members')->insert([
            'tenant_id' => '1',
            'nik' => '20221120002',
            'full_name' => 'Oktaviona Wulandari',
            'short_name' => 'Okta',
            'position' => 'Magang',
            'birth_place' => 'Nusa Dua',
            'birth_date' => '2002-09-14',
            'gender' => 'Perempuan',
            'religion' => 'Hindu',
            'status' => 'Belum Menikah',
            'email' => 'oktaviona7@gmail.com',
            'phone' => '08123456782',
            'education' => 'SD/Sederajat',
            'address' => 'Jalan Arjuna',
            'process' => 'Pending',
        ]);

        DB::table('tenant_members')->insert([
            'tenant_id' => '2',
            'nik' => '20221120003',
            'full_name' => 'Cista Adnya',
            'short_name' => 'Cista',
            'position' => 'Magang',
            'birth_place' => 'Denpasar',
            'birth_date' => '2002-09-15',
            'gender' => 'Perempuan',
            'religion' => 'Hindu',
            'status' => 'Belum Menikah',
            'email' => 'ciizztaaa@gmail.com',
            'phone' => '08123456791',
            'education' => 'SD/Sederajat',
            'address' => 'Jalan Drupadi',
            'process' => 'Pending',
        ]);
    }
}
