<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Teacher::class;
    public function definition()
    {
        // $employee = Employee::factory()->create();
        $employeeId = Employee::pluck('id')->random();
        return [
            'emp_id' => $employeeId,
        ];
    }
}
