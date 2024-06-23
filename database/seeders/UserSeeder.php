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
            'name' => 'rizal',
            'username' => 'rizal123',
            'email' => 'rizal.hello@google.com',
            'avatar' => '/storage/avatar/rizal.jpg',
            'password' => Hash::make('rizal123'),
            'role' => false,
            'is_active' => true,
        ]);
        
        User::create([
            'name' => 'eren yaegar',
            'username' => 'eren123',
            'email' => 'eren.hello@google.com',
            'avatar' => '/storage/avatar/eren.jpg',
            'password' => Hash::make('eren123'),
            'role' => false,
            'is_active' => true,
        ]);
        
        User::create([
            'name' => 'violet evergarden',
            'username' => 'violet123',
            'email' => 'violet.hello@google.com',
            'avatar' => '/storage/avatar/violet.jpg',
            'password' => Hash::make('violet123'),
            'role' => false,
            'is_active' => true,
        ]);
        
        User::create([
            'name' => 'naruto uzumaki',
            'username' => 'naruto123',
            'email' => 'naruto.hello@google.com',
            'avatar' => '/storage/avatar/naruto.jpg',
            'password' => Hash::make('naruto123'),
            'role' => false,
            'is_active' => true,
        ]);
        
        User::create([
            'name' => 'asuka langlhey',
            'username' => 'asuka123',
            'email' => 'asuka.hello@google.com',
            'avatar' => '/storage/avatar/asuka.jpg',
            'password' => Hash::make('asuka123'),
            'role' => false,
            'is_active' => true,
        ]);

    }
}

