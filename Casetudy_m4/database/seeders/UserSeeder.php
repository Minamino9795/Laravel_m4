<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'nghia@gmail.com',
                'password' => '12345',
                'address'=> 'cam lộ',
                'phone'=>'0374180497',
                'image'=>'user.jpg',
                'gender'=>'nam',
                'birthday'=>'1997/04/18',
                'group_id'=>1,
            ],
            
        ];
  
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
