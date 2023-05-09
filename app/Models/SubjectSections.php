<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectSections extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_url',
        'description',
        'stt',
        'subject_id',
    ];
    public function document(){
        return $this->hasMany(Document::class,'id','sections_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}