<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hari')->insert([
            'id' => 1,
            'nama_hari' => 'Januari',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 2,
            'nama_hari' => 'Pebruari',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 3,
            'nama_hari' => 'Maret',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 4,
            'nama_hari' => 'April',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 5,
            'nama_hari' => "Mei",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 6,
            'nama_hari' => "Juni",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 7,
            'nama_hari' => "Juli",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 8,
            'nama_hari' => "Agustus",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 9,
            'nama_hari' => "September",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 10,
            'nama_hari' => "Oktober",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 11,
            'nama_hari' => "November",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('hari')->insert([
            'id' => 12,
            'nama_hari' => "Desember",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
