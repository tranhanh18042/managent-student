<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(int $user_id, int $subject_id)
    {
        $user = User::find($user_id);
        $subject = Subject::find($subject_id);
        return view('insertScore', compact('user', 'subject'));
    }
    public function storeScore(int $user_id, int $subject_id, Request $request)
    {
        UserSubject::where('user_id', $user_id)
            ->where('subject_id', $subject_id)
            ->update(['score_process' => $request->score_process, 'score_test' => $request->score_test]);    
        return redirect()->route('subject.detail',['id' => $subject_id]);
    }
}
