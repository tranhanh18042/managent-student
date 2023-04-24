<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * @Handle an incoming request Show list results of user
     * @return view('result') 
     */
    function showResult()
    {
        $user = User::find(Auth::user()->id);
        $subject = $user->subject()->get();
        $userSubject = UserSubject::where('user_id', $user->id)->get();
        return view('result', compact('userSubject', 'subject'));
    }
}
