<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bill;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Factories\Factory;

// Models
use App\Models\User;
use App\Models\Session;
use App\Models\Progress;
use App\Models\Vehicle;
use App\Models\Exam;
use App\Models\Payment;
use App\Models\Spending;
use PharIo\Manifest\Email;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // 1 admin
        User::create([
            'name' => 'admin1',
            'email' => 'admin@mail.com',
            'phone' => '0123456789',
            'address' => 'Rue de la Paix, 1000 Bruxelles',
            'password' => bcrypt('password'),
            'type' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        User::create([
            'name' => 'admin2',
            'email' => 'admin2@mail.com',
            'phone' => '0123456789',
            'address' => 'Rue de la Paix, 1000 Bruxelles',
            'birthdate' => '1999-12-30',
            'password' => bcrypt('password'),
            'type' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Instructor 1',
            'email' => 'instructor1@mail.com',
            'phone' => '0123456789',
            'address' => 'Rue druxelles',
            'birthdate' => '1999-12-30',
            'password' => bcrypt('password'),
            'type' => 'instructor',
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Instructor 2',
            'email' => 'instructor2@mail.com',
            'phone' => '0123456789',
            'address' => 'Rue druxelles',
            'birthdate' => '1999-12-30',
            'password' => bcrypt('password'),
            'type' => 'instructor',
            'bywho' => 2,
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        User::factory()->count(30)->create();

        // some vehicles
        Vehicle::create([
            'user_id' => 1,
            'title' => 'Peugeot 208',
            'matricule' => '1-ABC-123',
            'model' => 'Peugeot 208',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Vehicle::create([
            'user_id' => 2,
            'title' => 'Peugeot 308',
            'matricule' => '2-ABC-123',
            'model' => 'Peugeot 308',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bill::create([
            'title' => 'Bill 1',
            'description' => 'Bill 1 description',
            'amount' => 100,
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bill::create([
            'title' => 'Bill 2',
            'description' => 'Bill 2 description',
            'amount' => 200,
            'bywho' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bill::create([
            'title' => 'Bill 3',
            'description' => 'Bill 3 description',
            'amount' => 150,
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Spending::create([
            'title' => 'Spending 1',
            'user_id' => 1,

            'amount_spent' => 1000,
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Spending::create([
            'title' => 'Spending 2',
            'user_id' =>  2,

            'amount_spent' => 2500,
            'bywho' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Spending::create([
            'title' => 'Spending 3',
            'user_id' => 3,

            'amount_spent' => 1500,
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);




        $exam1 = Exam::create([
            'exam_type' => 'drive',
            'exam_title' => 'Exam 2',
            'exam_date' => '2021-07-06',
            'exam_time' => '10:00:00',
            'exam_location' => 'Rue de la Paix, 1000 Bruxelles',
            'instructor_id' => 2,
            'vehicle_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $exam1->user()->attach([4, 5, 6, 7, 8]);

        $exam2 = Exam::create([
            'exam_type' => 'code',
            'exam_title' => 'Exam 3',
            'exam_date' => '2021-07-06',
            'exam_time' => '10:00:00',
            'exam_location' => 'Rue de la Paix, 1000 Bruxelles',
            'instructor_id' => 2,
            'vehicle_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $exam2->user()->attach([9, 10, 11, 12, 13]);

        Payment::create([
            'student_id' => 10,
            'amount_paid' => 100,
            'goal_amount' => 1000,
            'remaining_amount' => 900,
            'payment_date' => '2021-07-06',
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Payment::create([
            'student_id' => 11,
            'amount_paid' => 300,
            'goal_amount' => 1000,
            'remaining_amount' => 700,
            'payment_date' => '2021-07-06',
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Payment::create([
            'student_id' => 11,
            'amount_paid' => 500,
            'goal_amount' => 1000,
            'remaining_amount' => 200,
            'payment_date' => '2021-07-06',
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Payment::create([
            'student_id' => 13,
            'amount_paid' => 300,
            'goal_amount' => 10000,
            'remaining_amount' => 9700,
            'payment_date' => '2021-07-06',
            'bywho' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Payment::factory()->count(10)->create();
    }
}
