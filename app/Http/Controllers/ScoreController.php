<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScoreRequest;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(int $userId, int $subjectId)
    {
        $user = User::find($userId);
        $subject = Subject::find($subjectId);
        return view('insertScore', compact('user', 'subject'));
    }
    public function storeScore(int $userId, int $subjectId, ScoreRequest $request)
    {
        UserSubject::where('user_id', $userId)
            ->where('subject_id', $subjectId)
            ->update(['score_process' => $request->score_process, 'score_test' => $request->score_test]);
        return redirect()->route('subject.detail', ['id' => $subjectId]);
    }
}
