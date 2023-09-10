<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Type extends Model
{
    use HasFactory;
    protected $table = 'status_type';
    protected $fillable = ['name'];
}
