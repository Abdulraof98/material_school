<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_Class;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject_Class>
 */
class Subject_ClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subject_Class::class;
    public function definition()
    {
        
        $class_id = Classes::pluck('id')->random();
        $subject_id = Subject::pluck('id')->random();
        return [
        'class_id' => $class_id,
        'subject_id' => $subject_id,
        
        ];
    }
}
