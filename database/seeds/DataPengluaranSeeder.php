<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPengluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_pengluaran')->insert([
            'id' => 1,
            'kelas_id' => '3',
            'nama' => 'Dana Pinjam',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('data_pengluaran')->insert([
            'id' => 2,
            'kelas_id' => '3',
            'nama' => 'Dana Darurat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('data_pengluaran')->insert([
            'id' => 3,
            'kelas_id' => '3',
            'nama' => 'Dana Amal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('data_pengluaran')->insert([
            'id' => 4,
            'kelas_id' => '3',
            'nama' => 'Dana Acara',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('data_pengluaran')->insert([
            'id' => 5,
            'kelas_id' => '3',
            'nama' => 'Dana Kas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('data_pengluaran')->insert([
            'id' => 6,
            'kelas_id' => '3',
            'nama' => 'Dana Lain',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
