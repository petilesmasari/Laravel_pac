<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Peti',
            'email' => 'peti@gmail.com',
            'password' => \bcrypt('peti123')
        ];
        User::insert($user);
    }
}
