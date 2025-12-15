<?php

namespace Database\Seeders;

use App\Models\AdministrationRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministrationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdministrationRequest::factory()->count(30)->create();
    }
}
