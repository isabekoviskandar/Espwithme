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
            'first_name' => 'iskandar',
            'last_name' => 'isabekov',
            'username' => 'isabekoff',
            'phone' => '+998950200926',
            'role' => 'admin',
            'email' => 'iskandarisabrkov@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
