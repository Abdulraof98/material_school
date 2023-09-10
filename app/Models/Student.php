<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id','first_name','last_name','gender','date_of_birth','date_of_join','class_id','address','family_phone_no','document_id','status'];

    public function document(){
        return $this->belongsTo(Document::class,'document_id');
    }
    
    public function class_student(){
        return $this->hasMany(Class_Student::class, 'student_id');
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_student', 'student_id', 'class_id');
    }


    public function payment_history(){
        return $this->hasMany(PaymentHistory::class,'student_id');
    }
    public function payment_histories($id)
    {
        return $this->hasMany(PaymentHistory::class,'student_id')
            ->where('installment_id', $id)->get();
    //    dd($query->toSql());
      
    }
    public function getTotalAmountPaidForClass($classId)
    {
        return $this->payment_history()
        ->join('installments', 'installments.id', '=', 'payment_history.installment_id')
        ->where('installments.class_id', $classId)
        ->selectRaw('SUM(payment_history.amount) + SUM(payment_history.offer_applied) as total_amount')
        ->pluck('total_amount')
        ->first();
    }

    public function getTotalAmountPaid()
{
    return $this->installment->sum(function ($installment) {
        return $installment->payment_history->sum('amount');
    });
}

}
