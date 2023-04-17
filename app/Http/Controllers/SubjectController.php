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
    public function getListSubject()
    {
        $user = User::find(Auth::user()->id);
        $subject_applies = $user->subject()->pluck('subject_id');
        $list_subject_teacher = Subject::where('teacher_id', $user->id)->get();
        $list_subject = Subject::whereNotIn('id', $subject_applies)->get();
        return view('listSubject', compact('list_subject', 'user', 'list_subject_teacher'));
    }
    public function subjectDetail(int $id)
    {
        $subject = Subject::find($id);
        $user = User::find(Subject::find($id)->teacher_id);
        $student = $subject->user()->get();
        $role_user_login = Auth::user()->role;
        return view('subjectDetail', compact('subject', 'user', 'student', 'role_user_login'));
    }
    public function updateSubject(Request $request, int $id)
    {
        $subject = Subject::find($id);
        $subject->subject_name = $request->subject_name;
        $subject->start_date = $request->start_date;
        $subject->end_date = $request->end_date;
        $subject->save();
        return redirect('subjects');
    }

    public function indexAddSubject()
    {
        $user = Auth::user();
        return view('createSubject', compact('user'));
    }
    public function createSubject(SubjectRequest $request)
    {

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
    public function indexUpdateSubject($id)
    {
        $subject = Subject::find($id);
        return view('updateSubject', compact('subject'));
    }

    public function deleteSubject(int $id)
    {
        $subject = Subject::find($id);
        $user = $subject->user()->pluck('user_id');
        $count_user = count($user);
        if ($count_user == 0) {
            $subject->delete();
        }
        return redirect('subjects');
    }
    public function addStudent(Request $request, int $id)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $user = User::find($request->id);
        $subject = Subject::find($id);
        if ($user != null && $user->role == 0) {
            $subject->user()->attach($user->id);
        }
        return redirect()->back();
    }
    public function removeStudent(int $user_id, int $subject_id)
    {
        $subject = Subject::find($subject_id);
        if (Auth::user()->role == 1) {
            $subject->user()->detach($user_id);
        }
        return redirect()->back();
    }
}
