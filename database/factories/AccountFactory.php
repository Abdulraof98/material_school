<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Employee;
use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Account::class;
    
    public function definition()
    {
        $user_id = User::pluck('id')->random();
        $emp_id = Employee::pluck('id')->random();
        return [
            'account_no' => $user_id,
            'balance' => $this->faker->randomFloat(2, 0, 1000),
            'emp_id' => $emp_id,
        ];
        
    }
}
