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
                'role' => 'super admin',
                'phone' => '081234567890',
                'national_id' => '3201010101900001',
                'image_path' => 'https://i.pravatar.cc/150?u=superadmin@pandawa.com'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@pandawa.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'phone' => '081234567891',
                'national_id' => '3201010101900002',
                'image_path' => 'https://i.pravatar.cc/150?u=admin@pandawa.com'
            ],
            [
                'name' => 'Admin Keuangan',
                'email' => 'keuangan@pandawa.com',
                'password' => Hash::make('12345678'),
                'role' => 'keuangan',
                'phone' => '081234567892',
                'national_id' => '3201010101900003',
                'image_path' => 'https://i.pravatar.cc/150?u=keuangan@pandawa.com'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567893',
                'national_id' => '3201010101900004',
                'image_path' => 'https://i.pravatar.cc/150?u=budi.santoso@gmail.com'
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567894',
                'national_id' => '3201010101900005',
                'image_path' => 'https://i.pravatar.cc/150?u=siti.nurhaliza@gmail.com'
            ],
            [
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad.rizki@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567895',
                'national_id' => '3201010101900006',
                'image_path' => 'https://i.pravatar.cc/150?u=ahmad.rizki@gmail.com'
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567896',
                'national_id' => '3201010101900007',
                'image_path' => 'https://i.pravatar.cc/150?u=dewi.lestari@gmail.com'
            ],
            [
                'name' => 'Eko Prasetyo',
                'email' => 'eko.prasetyo@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567897',
                'national_id' => '3201010101900008',
                'image_path' => 'https://i.pravatar.cc/150?u=eko.prasetyo@gmail.com'
            ],
            [
                'name' => 'Rina Wati',
                'email' => 'rina.wati@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567898',
                'national_id' => '3201010101900009',
                'image_path' => 'https://i.pravatar.cc/150?u=rina.wati@gmail.com'
            ],
            [
                'name' => 'Joko Widodo',
                'email' => 'joko.widodo@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567899',
                'national_id' => '3201010101900010',
                'image_path' => 'https://i.pravatar.cc/150?u=joko.widodo@gmail.com'
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya.sari@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567810',
                'national_id' => '3201010101900011',
                'image_path' => 'https://i.pravatar.cc/150?u=maya.sari@gmail.com'
            ],
            [
                'name' => 'Andi Wijaya',
                'email' => 'andi.wijaya@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567811',
                'national_id' => '3201010101900012',
                'image_path' => 'https://i.pravatar.cc/150?u=andi.wijaya@gmail.com'
            ],
            [
                'name' => 'Putri Ayu',
                'email' => 'putri.ayu@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pengguna',
                'phone' => '081234567812',
                'national_id' => '3201010101900013',
                'image_path' => 'https://i.pravatar.cc/150?u=putri.ayu@gmail.com'
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
