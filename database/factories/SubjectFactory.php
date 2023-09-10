<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject_Class>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'subject_name' => $this->faker->word,
            'fees' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement([0, 1]),
            // other attributes...
        ];
    }
}
