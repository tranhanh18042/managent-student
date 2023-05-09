<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name_document',
        'link_document',
        'subject_sections_id',
    ];
    public function subjectSection(){
        return $this->belongsTo(SubjectSections::class, 'subject_sections_id','id');
    }
}
