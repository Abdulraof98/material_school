<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transaction::class;
    public function definition()
    {
        // $account = Account::factory()->create();
        $account_id = Account::pluck('id')->random();


        return [
            'account_id' => $account_id,
            'tran_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tran_type' => $this->faker->randomElement(['credit', 'debit']),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            // other attributes...
        ];
    }
}
