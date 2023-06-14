<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TingkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['keterangan' => 'Ringan'],
            ['keterangan' => 'Sedang'],
            ['keterangan' => 'Parah'],
        ];
        DB::table('tingkatan')->insert($data);
    }
}
