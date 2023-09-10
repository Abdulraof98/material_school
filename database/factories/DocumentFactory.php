<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Class_Student>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Document::class;
    public function definition()
    {
        return [
        'name' => $this->faker->name,
        'address' => $this->faker->paragraph,
        'description' => $this->faker->paragraph
        ];
    }
}
