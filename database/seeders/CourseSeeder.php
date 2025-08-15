<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $professors = Professor::all();
        
        Course::factory(10)->create()->each(function ($course) use ($professors) {
            $course->update(['professor_id' => $professors->random()->id]);
        });
    }
}
