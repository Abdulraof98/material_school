<?php

namespace Database\Factories;

use App\Models\Fee;
use App\Models\Installment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Installment>
 */
class InstallmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Installment::class;
    public function definition()
    {
        // $fee = Fee::factory()->create();
        $fee_id = Fee::pluck('id')->random();
        return [
            'fee_id' => $fee_id,
            'amount' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
