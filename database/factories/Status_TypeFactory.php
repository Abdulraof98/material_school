<?php

namespace Database\Factories;

use App\Models\Status_Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student_Type>
 */
class Status_TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Status_Type::class;
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Active', 'Suspended','Not Active'])
        ];
    }
}
