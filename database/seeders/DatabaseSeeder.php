<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        // Author user
        User::create([
            'name' => 'Author User',
            'email' => 'author@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'author',
        ]);

        {
    $this->call(AdminSeeder::class);
}

        
    }
    
}
