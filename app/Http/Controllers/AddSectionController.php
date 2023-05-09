<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class AddSectionController extends Controller
{
    public function index()
    {
        return view('addSection');
    }
    public function addSection(Request $request, int $id)
    {
        $subject = Subject::find($id);
        $subject->subjectSections()->create([
            'stt' => $request->stt,
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
        ]);
        
        return redirect()->route('subject.detail',['id' => $id]);
    }
}
