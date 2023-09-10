<?php

namespace Database\Factories;

use App\Models\Class_Student;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Builder\Class_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Class_Student>
 */
class Class_StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Class_Student::class;
    public function definition()
    {
        // $class = Classes::factory()->create();
        // $student = Student::factory()->create();
        $class_id = Classes::pluck('id')->random();
        $student_id = Student::pluck('id')->random();

        return [
        'class_id' => $class_id,
        'student_id' => $student_id,
        'created_at' => now(),
        ];
    }
}
