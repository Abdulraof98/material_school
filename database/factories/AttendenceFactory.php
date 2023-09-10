<?php

namespace Database\Factories;

use App\Models\Attendence;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendence>
 */
class AttendenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Attendence::class;
    public function definition()
    {
        
        $subject_id = Subject::pluck('id')->random();
        $student_id = Student::pluck('id')->random();
        return [
            
                'subject_id' => $subject_id,
                'student_id' => $student_id,
                'status' => $this->faker->randomElement([0, 1]),
                'date' => now(),
            ];
        
    }
}
