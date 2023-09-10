<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','phone_no','date_of_join','date_of_birth','salary_type','address','document_id','status'];

    public function document(){
        return $this->belongsTo(Document::class,'document_id');
    }

    public function account(){
        return $this->hasOne(Account::class,'emp_id');
    }

    public function salary(){
        return $this->hasMany(EmployeeSalary::class,'emp_id');
    }
    public function class(){
        return $this->hasMany(Classes::class,'teacher_id');
    }

    public function salary_type(){
        return $this->belongsTo(SalaryType::class,'salary_type');
    }
    

}
