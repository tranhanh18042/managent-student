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
        'reference_id',
    ];
    public function reference(){
        return $this->hasMany(Document::class,'id','reference_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'id','sections_id');
    }
}