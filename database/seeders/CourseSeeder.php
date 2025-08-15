<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professors = Professor::all();
        
        Course::factory(10)->create()->each(function ($course) use ($professors) {
            // Assign a random professor to each course
            $course->update(['professor_id' => $professors->random()->id]);
        });
    }
}
