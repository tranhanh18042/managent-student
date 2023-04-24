<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * @Handle an incoming request Logout
     * @return redirect->route('login) 
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
