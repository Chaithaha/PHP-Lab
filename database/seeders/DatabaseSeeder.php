<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => bcrypt('password'),
        ]);
        
        Student::factory(100)->create();
        
        $this->call([
            ProfessorSeeder::class,
            CourseSeeder::class,
            StudentCourseSeeder::class,
        ]);
    }
}
