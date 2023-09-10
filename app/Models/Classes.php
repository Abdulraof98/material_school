<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = ['id','teacher_id','class_name','start_date','end_date','duration','total_seat','status'];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','emp_id');
    }
    public function class_student(){
        return $this->hasMany(Class_Student::class,'class_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_student', 'class_id', 'student_id');
    }

    
    public function teacher_from_class()
    {
        return $this->teacher->employee->first_name;
    }
    public function installment(){
        return $this->hasMany(Installment::class,'class_id');
    }

    public function getTotalAmountPaid()
    {
        return $this->installment->sum(function ($installment) {
            return $installment->payment_history->sum('amount');
        });
    }

    public function totalStudent(){
        return $this->class_student()->count();
    }

    public function classFee(){

        return $this->installment()->sum('amount');
    }
    public function remainingFee()
    {
        $totalAmountPaid = $this->getTotalAmountPaid();
        $totalStudents = $this->totalStudent();
        $classFee = $this->classFee();
        $totalFees = $totalStudents * $classFee;

        return $totalFees - $totalAmountPaid;
    }

    public function totalFees(){
        $totalStudents = $this->totalStudent();
        $classFee = $this->classFee();
        return $totalStudents * $classFee;
    }

}
