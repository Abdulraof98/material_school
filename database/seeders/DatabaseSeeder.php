<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Attendence;
use App\Models\Class_Student;
use App\Models\Classes;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Fee;
use App\Models\Installment;
use App\Models\Mark;
use App\Models\Mark_Detail;
use App\Models\Status_Type;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_Class;
use App\Models\Teacher;
use App\Models\Teacher_Subject;
use App\Models\Tran_Type;
use App\Models\Transaction;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // First Seeder
        Document::factory()->count(10)->create();
        User::factory()->count(10)->create();
        // Status_Type::factory()->count(3)->create();
        $val1 = [['type' => 0, 'value'=>'Not Active'],
                ['type' => 1 , 'value'=>'Active'],
                ['type' => 2 , 'value'=>'Suspended']];
        foreach ($val1 as $val) {
            Status_Type::create($val);
        }
        Subject::factory()->count(10)->create();
        // Tran_Type::factory()->count(2)->create();

        $debitTransaction = ['type' => 'debit' ];
        $creditTransaction = ['type' => 'credit'];

        Tran_Type::create($debitTransaction);
        Tran_Type::create($creditTransaction);

        // Second Seeder
        Employee::factory()->count(10)->create();
        Teacher::factory()->count(10)->create();
        Classes::factory()->count(10)->create();
        Student::factory()->count(10)->create();
        Account::factory()->count(10)->create();

        // Third Seeder
        Teacher_Subject::factory()->count(10)->create();
        Transaction::factory()->count(10)->create();
        Attendence::factory()->count(10)->create();
        Class_Student::factory()->count(10)->create();
        Subject_Class::factory()->count(10)->create();
        Fee::factory()->count(10)->create();
        Mark::factory()->count(10)->create();
        Installment::factory()->count(10)->create();
        Mark_Detail::factory()->count(10)->create();
    }
}
