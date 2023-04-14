<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function getListSubject(){
        $user = User::find(Auth::user()->id);
        $subject_applies = $user->subject()->pluck('subject_id');
        $list_subject_teacher = Subject::find($user->id)->get();
        $list_subject = Subject::whereNotIn('id', $subject_applies)->get();
        return view('listSubject', compact('list_subject','user','list_subject_teacher'));
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

    public function indexAddSubject(){
        $user = Auth::user();
        return view('createSubject', compact('user'));
    }
    public function createSubject(SubjectRequest $request){

        Subject::create([
            'subject_name' => $request->subject_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'teacher_id' => $request->teacher_id,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);
        return redirect('subjects');
    }

}
