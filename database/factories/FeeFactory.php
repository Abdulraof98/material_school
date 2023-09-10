<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Fee;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fee>
 */
class FeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Fee::class;
    public function definition()
    {
        // $class = Classes::factory()->create();
        // $student = Student::factory()->create();
        $class_id = Classes::pluck('id')->random();
        $student_id = Student::pluck('id')->random();
        return [
            'class_id' => $class_id,
            'student_id' => $student_id,
            //
        ];
    }
}
