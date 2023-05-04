<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScoreRequest;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Support\Facades\Redirect;

class ScoreController extends Controller
{
    /**
     * @Handle an incoming request page insert score
     * @param $userId, $subjectId
     * @return view('insertScore')
     */
    public function index(int $userId, int $subjectId)
    {
        $user = User::find($userId);
        $subject = Subject::find($subjectId);
        return view('insertScore', compact('user', 'subject'));
    }

    /**
     * @Handle an incoming request insert score for user in subject
     * @param \Illuminate\Requests\RegisterRequest  $request,
     * @param $userId, $subjectId 
     * @return  redirect
     */
    public function storeScore(int $userId, int $subjectId, ScoreRequest $request)
    {
        UserSubject::where('user_id', $userId)
            ->where('subject_id', $subjectId)
            ->update(['score_process' => $request->score_process, 'score_test' => $request->score_test]);
        return redirect()->route('subject.detail', ['id' => $subjectId]);
    }
    public function deleteSection()
    {
        
    }
}
