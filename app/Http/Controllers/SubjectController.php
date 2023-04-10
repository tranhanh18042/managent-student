<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getListSubject(){
        return SubjectResource::collection(Subject::all());
    }
    public function getSubjectByID(int $id){
        return new SubjectResource(Subject::findOrFail($id));
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
