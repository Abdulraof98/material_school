<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Console\RetryCommand;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['id','emp_id'];
    
    public function employee(){
        return $this->belongsTo(Employee::class,'emp_id');
    }
    public function class()
    {
        return $this->hasMany(Classes::class, 'teacher_id','emp_id');
    }

    public function teacherSalary(){
        return $this->hasMany(EmployeeSalary::class,'emp_id','emp_id');
    }

    public function teacherAccount(){
        return $this->hasOne(Account::class,'emp_id','emp_id');
    }

    public function salary_type(){
        return $this->employee()->belongsTo(SalaryType::class,'salary_type');
    }
}
