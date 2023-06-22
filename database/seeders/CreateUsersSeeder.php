<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nik' => '250404',
                'username'=>'admin',
                'name'=>'Admin User',
                'email'=>'admin@gmail.com',
                'phone' => '085335249308',
                'password'=> Hash::make('123456'),
                'roles'=> 1,
            ],
            [
                'nik' => '250405',
                'username'=>'kepala',
                'name'=>'Kepala Dinas User',
                'email'=>'kepala@gmail.com',
                'phone' => '085335249300',
                'password'=> Hash::make('123456'),
                'roles'=>1,
            ],
            [
                'nik' => '280405',
                'username'=>'user',
                'name'=>'User',
                'email'=>'user@gmail.com',
                'phone' => '081335249300',
                'password'=> Hash::make('123456'),
                'roles'=>0,
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
