<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_Subject extends Model
{
    use HasFactory;
    protected $table = 'teacher_subject';
    protected $fillable = ['teacher_id','subject_id'];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    
    public function student()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
