<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data rizal
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => true,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john.doe@example.com',
            'avatar' => '/storage/avatar/profile1.jpg',
            'password' => Hash::make('password1'),
            'role' => false,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Jane Smith',
            'username' => 'janesmith',
            'email' => 'jane.smith@example.com',
            'avatar' => '/storage/avatar/profile5.jpg',
            'password' => Hash::make('password2'),
            'role' => false,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Michael Johnson',
            'username' => 'michaeljohnson',
            'email' => 'michael.johnson@example.com',
            'avatar' => '/storage/avatar/profile2.jpg',
            'password' => Hash::make('password3'),
            'role' => false,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Emily Davis',
            'username' => 'emilydavis',
            'email' => 'emily.davis@example.com',
            'avatar' => '/storage/avatar/profile3.jpg',
            'password' => Hash::make('password4'),
            'role' => false,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'William Brown',
            'username' => 'williambrown',
            'email' => 'william.brown@example.com',
            'avatar' => '/storage/avatar/profile4.jpg',
            'password' => Hash::make('password5'),
            'role' => false,
            'is_active' => true,
        ]);

    }
}

