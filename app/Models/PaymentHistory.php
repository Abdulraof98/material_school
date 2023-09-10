<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    protected $table = 'payment_history'; 
    protected $fillable = ['id', 'installment_id','student_id','amount','offer_applied', 'date'];
    public $timestamps = false;

    public function installment()
    {
        return $this->belongsTo(Installment::class, 'installment_id');
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    
}
