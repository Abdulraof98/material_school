<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['id','account_no','balance','emp_id'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class,'account_id','account_no');
    }
    // this is prefered
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'account_id','account_no');
    }

}
