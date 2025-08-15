<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();
        
        // Assign each student to 1-3 random courses
        $students->each(function ($student) use ($courses) {
            $randomCourses = $courses->random(rand(1, 3));
            $student->courses()->attach($randomCourses->pluck('id'));
        });
    }
}
