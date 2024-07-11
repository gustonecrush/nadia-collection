<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'name' => 'Anggun',
            'password' => Hash::make('admin123')
        ]);

        \App\Models\Admin::create([
            'username' => 'koordinator',
            'email' => 'koordinator@gmail.com',
            'role' => 'Koordinator',
            'name' => 'Yasmin Putri',
            'password' => Hash::make('koordinator123')
        ]);
    }
}
