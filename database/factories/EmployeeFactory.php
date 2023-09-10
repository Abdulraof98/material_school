<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Employee::class;

    
    public function definition()
    {
        
        $doc_id = Document::pluck('id')->random();
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone_no' => $this->faker->phoneNumber,
            'date_of_join' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'date_of_birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'salary_type' => $this->faker->randomElement(['Hourly', 'Monthly']),
            'address' => $this->faker->address,
            'document_id' => $doc_id,
            'status' => $this->faker->randomElement([0, 1]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
