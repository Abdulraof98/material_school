<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryType extends Model
{
    use HasFactory;
    protected $table = 'salary_type';
    protected $fillable = ['id','type'];

    public function type(){
        return $this->hasMany(EmployeeSalary::class,'type')->pluck('type');
    }
}
