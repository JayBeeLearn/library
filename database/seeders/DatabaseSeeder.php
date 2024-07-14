<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Review::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Jay User',
            'email' => 'jay@gmail.com',
            'author' => true,
            'email_verified_at' => now(),
            'password' => 'test',
        ]);

         \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'author' => true,
            'email_verified_at' => now(),
            'password' => 'test',
        ]);
    }
}
