<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'fullname' => 'Instructor',
            'email' => 'instructor@mail.me',
            'phone' => "061212121",
            'password' => '1234',
            'user_type' => 'instructor',
            'image' => '',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Student',
            'email' => 'student@student.me',
            'phone' => "066666666",
            'password' => '1234',
            'user_type' => 'student',
            'image' => '',
        ]);

        // User::factory(30)->create();
    }
}
