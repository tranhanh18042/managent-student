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
        'references',
    ];
    public function reference(){
        return $this->hasMany(Reference::class,'id','reference_id');
    }
}