<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();
        
        $students->each(function ($student) use ($courses) {
            $randomCourses = $courses->random(rand(1, 3));
            $student->courses()->attach($randomCourses->pluck('id'));
        });
    }
}
