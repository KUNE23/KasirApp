<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Fian',
            'username' => 'kune',
            'password' => bcrypt('123'),
            'level' => "Admin",
            'notelp' => '082295694326',
        ]);
        User::create([
            'nama' => 'alfi',
            'username' => 'kasir',
            'password' => bcrypt('456'),
            'level' => "Kasir",
            'notelp' => '081337546313',
        ]);
    }
}
