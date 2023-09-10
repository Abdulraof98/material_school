<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;
    protected $table = 'employee_salary';
    protected $fillable = ['id','salary_type','emp_id','amount','start_date','class_id','percentage','duration'];

    public function salary_types(){
        return $this->belongsTo(SalaryType::class,'salary_type');
    }
    
    public function class(){
        return $this->belongsTo(Classes::class,'emp_id');
    }
}
