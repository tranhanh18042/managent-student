<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * @Handle an incoming request show list subject
     * @param int $id
     * @return view('listSubject');
     */
    public function getListSubject()
    {
        $user = User::find(Auth::user()->id);
        $subjectApplies = $user->subject()->pluck('subject_id');
        $listSubjectTeacher = Subject::where('teacher_id', $user->id)->get();
        $listSubject = Subject::whereNotIn('id', $subjectApplies)->get();
        return view('listSubject', compact('listSubject', 'user', 'listSubjectTeacher'));
    }

    /**
     * @Handle an incoming request create Subject
     * @param int $id
     * @return view('subjecctDetail');
     */
    public function subjectDetail(int $id)
    {
        $subject = Subject::find($id);
        $user = Auth::user();
        $student = $subject->user()->get();
        $userSubject = UserSubject::where('subject_id', $subject->id)->get();
        $roleUserLogin = Auth::user()->role;
        return view('subjecctDetail', compact('subject', 'user', 'student', 'userSubject', 'roleUserLogin'));
    }

    /**
     * @Handle an incoming request update Subject
     * @param  App\Http\Requests\SubjectRequest $request
     * @param int $id
     * @return redirect('subjects');
     */
    public function updateSubject(SubjectRequest $request, int $id)
    {
        $subject = Subject::find($id);
        $subject->subject_name = $request->subject_name;
        $subject->start_date = $request->start_date;
        $subject->end_date = $request->end_date;
        $subject->save();
        return redirect('subjects');
    }


    /**
     * @Handle an incoming request page add subject
     * @return view('createSubject');
     */
    public function indexAddSubject()
    {
        $user = Auth::user();
        return view('createSubject', compact('user'));
    }

    /**
     * @Handle an incoming request create Subject
     * @param  App\Http\Requests\SubjectRequest $request
     * @return redirect('subjects');
     */
    public function createSubject(SubjectRequest $request)
    {
        $teacherId = Auth::user()->id;
        Subject::create([
            'subject_name' => $request->subject_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'teacher_id' => $teacherId,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);
        return redirect('subjects');
    }

     /**
     * @Handle an incoming request page update subject
     * @param  $id
     * @return view('updateSubject');
     */
    public function indexUpdateSubject($id)
    {
        $subject = Subject::find($id);
        return view('updateSubject', compact('subject'));
    }

    /**
     * @Handle an incoming request delete subject;
     * @param  $id
     * @return redirect('subjects');
     */
    public function deleteSubject(int $id)
    {
        $subject = Subject::find($id);
        $user = $subject->user()->pluck('user_id');
        $countUser = count($user);
        if ($countUser == 0) {
            $subject->delete();
        }
        return redirect('subjects');
    }

    /**
     * @Handle an incoming request add students the subject
     * @param  $id
     * @param   App\Http\Requests\AddStudentRequest $request
     * @return redirect()->back();
     */
    public function addStudent(AddStudentRequest $request, int $id)
    {
        $user = User::find($request->id);
        $subject = Subject::find($id);
        if ($user == null) {
            return redirect()->back();
        }
        $userSubject = UserSubject::where('user_id', $user->id)
            ->where('subject_id', $subject->id)
            ->first();
        if ($user != null && $user->role == 0 && $userSubject == null) {
            $subject->user()->attach($user->id);
        }
        return redirect()->back();
    }

    /**
     * @Handle an incoming request remove student in subject
     * @param  $userId ,$subjectId
     * @return redirect()->back();
     */
    public function removeStudent(int $userId, int $subjectId)
    {
        $subject = Subject::find($subjectId);
        if (Auth::user()->role == 1) {
            $subject->user()->detach($userId);
        }
        return redirect()->back();
    }
   
     /**
     * @Handle an incoming request join the subject
     * @param  $id
     * @return redirect()->back();
     */
    public function joinSubject(int $id)
    {
        $subject = Subject::find($id);
        $user = Auth::user();
        if ($user->role == 0) {
            $subject->user()->attach($user->id);
        }
        return redirect()->back();
    }

    /**
     * @Handle an incoming request Show list subject of student
     * @return view('listSubjectStudent')
     */
    public function showListSubjectStudent()
    {
        $user = User::find(Auth::user()->id);
        $listSubject = $user->subject()->get();
        return view('listSubjectStudent', compact('listSubject', 'user'));
    }
}
