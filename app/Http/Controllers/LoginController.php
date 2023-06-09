<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * @Handle an incoming request show form for login
     * @return view('login) 
     */
    public function showloginErr()
    {
        return view('login');
    }

    /**
     * @Handle an incoming request Login
     * @param  \Illuminate\Requests\LoginRequest  $request
     * @return redirect()->route('home') 
     * @throws redirect()->back();
     */
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();
        $checkPass = Hash::check($request->password, $user->password);
        if ($user != null && $checkPass == true) {
            Auth::login($user);
            return redirect()->route('home');
        }

        Session::flash('error', 'Sai mat khau hoac tai khoan');
        return redirect()->back();
    }
}
