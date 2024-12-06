<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'address' => 'Admin Address',
                'phone' => '12345678',
                'specialty' => 'Management',
                'availability' => true,
            ]);
    
            User::create([
                'name' => 'Expert User',
                'email' => 'expertuser@example.com',
                'password' => Hash::make('expert123'),
                'role' => 'expert',
                'address' => 'Expert Address',
                'phone' => '98765432',
                'specialty' => 'Clinical Research',
                'availability' => true,
                'domaine_id' => 2, // Health domain
            ]);
    
            User::create([
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'address' => 'User Address',
                'phone' => '12309876',
                'specialty' => null,
                'availability' => true,
            ]);
        }
    }
}
