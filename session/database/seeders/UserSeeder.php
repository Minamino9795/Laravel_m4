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
            ],
            
        ];
  
        foreach ($users as $key => $value) {
            User::create($value);
        }
    
    }
}
