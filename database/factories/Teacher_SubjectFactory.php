<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Teacher_Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teachur_Subject>
 */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class Teacher_SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Teacher_Subject::class;
    public function definition()
    {
        // $teacher = Teacher::factory()->create();
        // $subject = Subject::factory()->create();
        $teacher_id = Teacher::pluck('id')->random();
        $subject_id = Subject::pluck('id')->random();


        return [
            'teacher_id' => $teacher_id,
            'subject_id' => $subject_id,
            // other attributes...
        ];
    }
}
