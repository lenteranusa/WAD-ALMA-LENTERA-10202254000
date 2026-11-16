<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::forceCreate([
            'name' => 'Admin', 'email' => 'admin@dondone.test',
            'password' => Hash::make('password'), 'role' => 'admin', 'is_active' => true,
        ]);
        User::forceCreate([
            'name' => 'Staff', 'email' => 'staff@dondone.test',
            'password' => Hash::make('password'), 'role' => 'staff', 'is_active' => true,
        ]);
        User::forceCreate([
            'name' => 'Inactive', 'email' => 'inactive@dondone.test',
            'password' => Hash::make('password'), 'role' => 'staff', 'is_active' => false,
        ]);
    }
}