<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark_Detail extends Model
{
    use HasFactory;
    protected $table = 'mark_details';
    protected $fillable = ['mark_id','max_marks','gained_mark','description'];

    public function mark(){
        return $this->belongsTo(Mark::class,'mark_id');
    }
}
