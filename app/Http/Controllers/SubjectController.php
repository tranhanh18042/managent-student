<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getListSubject(){
        $list_subject = Subject::all();
        // dd($list_subject);
        return view('listSubject', compact('list_subject'));
    }
    public function subjectDetail(){
        return view('subjectDetail');
    }
    public function updateSubjectByID(Request $request,int $id){
        $subject = Subject::where('id',$id)->update($request->all());
        return $subject;
    }

    public function createSubject(Request $request,Subject $subject){
        $subject = Subject::created([
            'subject_name'=> $request -> subject_name,
            'teacher_id'=> $request -> teacher_id,
            'start_date'=> $request -> start_date,
            'end_date'=> $request -> end_date,
        ]);
        return $subject;
    }

}
