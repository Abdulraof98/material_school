<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;
    public function definition()
    {
        
        $doc_id = Document::pluck('id')->random();
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'date_of_birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'date_of_join' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'starting_class' => $this->faker->randomElement(['Nursery', 'Kindergarten', 'Grade 1', 'Grade 2']),
            'address' => $this->faker->address,
            'family_phone_no' => $this->faker->phoneNumber,
            'document_id' => $doc_id,
            'status' => $this->faker->randomElement([0, 1]),
            // other attributes...
        ];
    }
}
