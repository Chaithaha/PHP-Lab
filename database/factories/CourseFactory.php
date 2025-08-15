<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Mathematics', 'Physics', 'Chemistry', 'Biology', 'Computer Science',
            'Engineering', 'Economics', 'Psychology', 'Sociology', 'History',
            'Literature', 'Philosophy', 'Art', 'Music', 'Business',
            'Marketing', 'Finance', 'Accounting', 'Management', 'Statistics'
        ];

        $levels = ['Introduction to', 'Advanced', 'Fundamentals of', 'Principles of', 'Essentials of'];
        $topics = [
            'Data Structures', 'Algorithms', 'Web Development', 'Database Systems',
            'Machine Learning', 'Artificial Intelligence', 'Software Engineering',
            'Network Security', 'Cloud Computing', 'Mobile Development',
            'Digital Marketing', 'Financial Analysis', 'Human Resources',
            'Operations Management', 'Business Strategy', 'Market Research',
            'Statistical Analysis', 'Research Methods', 'Creative Writing',
            'Digital Design', 'Project Management', 'Leadership Skills'
        ];

        $subject = fake()->randomElement($subjects);
        $level = fake()->randomElement($levels);
        $topic = fake()->randomElement($topics);

        $courseName = fake()->randomElement([
            $level . ' ' . $subject,
            $subject . ': ' . $topic,
            $topic . ' in ' . $subject,
            $subject . ' ' . $topic,
            $level . ' ' . $topic
        ]);

        $descriptions = [
            "This comprehensive course covers the fundamental principles and advanced concepts of {$subject}. Students will gain practical experience through hands-on projects and real-world applications.",
            "Explore the core concepts and methodologies of {$topic} within the context of {$subject}. This course provides both theoretical knowledge and practical skills.",
            "A detailed examination of {$subject} focusing on {$topic}. Students will develop critical thinking skills and apply their knowledge to solve complex problems.",
            "This course introduces students to the essential concepts of {$topic} and their applications in {$subject}. Emphasis is placed on practical implementation and industry best practices.",
            "Advanced study of {$subject} with particular focus on {$topic}. Students will engage in research projects and develop expertise in current methodologies.",
            "Comprehensive overview of {$topic} principles and their integration with {$subject}. Course includes case studies, group projects, and individual research assignments.",
            "This course provides a solid foundation in {$subject} while exploring specialized topics in {$topic}. Students will develop both theoretical understanding and practical skills.",
            "An in-depth exploration of {$topic} within the broader field of {$subject}. Course emphasizes critical analysis, problem-solving, and innovative thinking.",
            "Students will learn the fundamental concepts of {$subject} with special attention to {$topic}. The course combines lectures, discussions, and hands-on laboratory work.",
            "This advanced course covers cutting-edge developments in {$topic} and their applications in {$subject}. Students will conduct independent research and present their findings."
        ];

        return [
            'name' => $courseName,
            'description' => fake()->randomElement($descriptions),
        ];
    }
}
