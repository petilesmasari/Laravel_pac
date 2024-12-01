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
        $user = [
            'name' => 'iksan',
            'email' => 'iksan@gmail.com',
            'password' => \bcrypt('iksan123')
        ];

        User::insert($user);
    }
}
