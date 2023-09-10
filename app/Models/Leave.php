<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = ['id','emp_id','date','amount','duration'];

    public function employee(){
        return $this->belongsTo(Fee::class,'emp_id');
    }

}
