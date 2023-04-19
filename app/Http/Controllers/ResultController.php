<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    function showResult()
    {
        $user = User::find(Auth::user()->id);
        $subject = $user->subject()->get();
        $user_subject = UserSubject::where('user_id', $user->id)->get();
        return view('result',compact('user_subject', 'subject'));
    }
}
