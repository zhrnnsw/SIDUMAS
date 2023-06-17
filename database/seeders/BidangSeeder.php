<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_bidang' => 'Bina Marga'],
            [ 'nama_bidang' => 'Cipta Karya']];
        DB::table('bidang')->insert($data);
    }
}
