<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'full_name' => 'Admin Quacker',
            'nickname' => 'admin',
            'email' => 'admin@quacker.com',
            'password' => Hash::make('password'),
            'bio' => 'Usuario administrador de Quacker',
        ]);

        User::factory()->count(9)->create();
    }
}