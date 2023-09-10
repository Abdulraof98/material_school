<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['account_id','tran_date','tran_type','amount','description'];
    
    public function account(){
        return $this->belongsTo(Account::class,'account_id');
    }

    public function tran_type(){
        return $this->belongsTo(Tran_Type::class,'tran_type');
    }
}
