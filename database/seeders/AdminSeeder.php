<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Nadi Nurita',
            'email' => 'amirhakiml2ews@gmail.com',
            'password' => Hash::make('admin123456'),
            'role' => 'admin',
        ]);
    }
}
