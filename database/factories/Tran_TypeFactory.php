<?php

namespace Database\Factories;

use App\Models\Tran_Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tran_Type>
 */

class Tran_TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tran_Type::class;
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['credit', 'debit']),
        ];
    }
}
