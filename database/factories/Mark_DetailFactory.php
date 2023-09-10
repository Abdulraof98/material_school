<?php

namespace Database\Factories;

use App\Models\Mark;
use App\Models\Mark_Detail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mark_Detail>
 */
class Mark_DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mark_Detail::class;
    public function definition()
    {
        // $mark = Mark::factory()->create();
        $mark_id = Mark::pluck('id')->random();

        return [
            'mark_id' => $mark_id,
            'max_marks' => $this->faker->randomElement([100,50,20]),
            'gained_mark' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->sentence,
            // other attributes...
        ];
    }
}
