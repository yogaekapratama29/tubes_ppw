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
            [
                'name' => 'Admin Keuangan',
                'email' => 'keuangan@pandawa.com',
                'password' => Hash::make('12345678'),
                'role' => 'keuangan'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad.rizki@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Eko Prasetyo',
                'email' => 'eko.prasetyo@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Rina Wati',
                'email' => 'rina.wati@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Joko Widodo',
                'email' => 'joko.widodo@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya.sari@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Andi Wijaya',
                'email' => 'andi.wijaya@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
            ],
            [
                'name' => 'Putri Ayu',
                'email' => 'putri.ayu@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna'
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
