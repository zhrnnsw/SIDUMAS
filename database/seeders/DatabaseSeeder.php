<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '25040413234',
            'username'=>'adminn',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '085335249308',
            'password' => Hash::make('admin'),
            'roles' => 1,
        ]);
    }
}
