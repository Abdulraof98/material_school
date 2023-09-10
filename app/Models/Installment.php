<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = ['id','class_id','amount'.'start_date','deadline'];

    public function fee(){
        return $this->belongsTo(Fee::class,'fee_id');
    }

    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function payment_history(){
        return $this->hasMany(PaymentHistory::class,'installment_id');
    }

    public function totalInstallmentPaid(){

        return $this->payment_history()->sum('amount');
    }

    public function classFee(){

        return $this->sum('amount');
    }

    public function singleInstallmentRemainingFee(){

        $totalStudents = $this->class->totalStudent();
        $totalAmount = $this->amount * $totalStudents;
        return $totalAmount;
    }
    
    public static function totalSingleInstallmentRemainingFee()
    {
        
    }


}
