<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Classes::class;
    public function definition()
    {
        
        $teacher_id = Teacher::pluck('id')->random();

        return [
        'teacher_id' => $teacher_id,
        'class_name' => $this->faker->randomElement(['Math', 'Science', 'English']),
        'start_date' => now(),
        'end_date' => now(),
        'duration' => $this->faker->numberBetween(1, 90),
        'total_seat' => $this->faker->numberBetween(1, 50),
        'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
