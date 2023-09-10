<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $table = 'attendence';
    protected $fillable = ['subject_id','student_id','status','date'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
