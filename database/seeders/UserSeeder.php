<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@pandawa.com',
                'password' => Hash::make('12345678'),
                'role' => 'super admin'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@pandawa.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
