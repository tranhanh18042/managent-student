<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subject_name',
        'teacher_id',
        'start_date',
        'end_date',
    ];
    public function User(){
        return $this->belongsToMany(User::class,'user_subjects','user_id','subject_id');
    }
}
