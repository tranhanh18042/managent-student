<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function getListSubject(){
        $user = User::find(Auth::user()->id);
        $subject_applies = $user->subject()->pluck('subject_id');
        $list_subject = Subject::whereNotIn('id', $subject_applies)->get();
        // dd($list_subject);  
        return view('listSubject', compact('list_subject','user'));
    }
    public function subjectDetail($id){
        $subject = Subject::find($id);
        $user = User::find(Subject::find($id)->teacher_id);
        return view('subjectDetail',compact('subject', 'user'));
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
