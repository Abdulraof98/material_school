<?php

namespace Database\Factories;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mark>
 */
class MarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mark::class;
    public function definition()
    {
        // $subject = Subject::factory()->create();
        // $student = Student::factory()->create();
        $subject_id = Subject::pluck('id')->random();
        $student_id = Student::pluck('id')->random();
        return [
            'subject_id' => $subject_id,
            'student_id' => $student_id,
            'percentage' => $this->faker->numberBetween(0, 100),
            // other attributes...
        ];
    }
}
