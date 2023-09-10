<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tran_Type extends Model
{
    use HasFactory;
    protected $table = 'tran_type';
    protected $fillable = ['type'];
}
