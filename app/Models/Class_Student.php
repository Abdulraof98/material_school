<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_Student extends Model
{
    use HasFactory;
    protected $table = 'class_student';
    protected $fillable = ['id','class_id','student_id','created_at'];
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
        
    }

    public function installment()
    {
        return $this->hasMany(Installment::class, 'class_id')->orderBy('class_id');
        
    }

    public function payment_history(){

        return $this->hasMany(PaymentHistory::class,'student_id','student_id');
    }
    
}
